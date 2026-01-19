import app from 'flarum/forum/app';
import Model from 'flarum/common/Model';
import { extend } from 'flarum/common/extend';
import AvatarEditor from 'flarum/forum/components/AvatarEditor';
import Button from 'flarum/common/components/Button';

app.initializers.add('vlssu/flarum-cravatar', () => {
  app.store.models.users.prototype.cravatar = Model.attribute('cravatar');

  extend(AvatarEditor.prototype, 'controlItems', function (items) {
    const user = this.attrs.user;
    const allowUserToggle = app.forum.attribute('vlssu-cravatar.allow-user-toggle');

    if (user.cravatar()) {
      items.remove('remove');

      items.add(
        'cravatar',
        <a href="https://cravatar.cn" target="_blank" class="hasIcon">
          <i class="icon fas fa-edit Button-icon"></i>
          <span class="Button-label">{app.translator.trans('vlssu-flarum-cravatar.forum.settings.edit-cravatar')}</span>
        </a>
      );
    }

    if (!allowUserToggle || !app.session.user || app.session.user.id() !== user.id()) {
      return;
    }

    const usingCravatar = !!user.cravatar();

    items.add(
      'cravatar-toggle',
      Button.component(
        {
          className: 'Button',
          icon: usingCravatar ? 'fas fa-upload' : 'fas fa-user-circle',
          loading: this.cravatarToggleLoading,
          onclick: () => {
            this.cravatarToggleLoading = true;
            const next = !usingCravatar;

            user
              .savePreferences({ 'vlssu-cravatar.use': next })
              .then(() => app.store.find('users', user.id()))
              .then((freshUser) => {
                user.pushData(freshUser.data);
              })
              .finally(() => {
                this.cravatarToggleLoading = false;
                m.redraw();
              });
          },
        },
        app.translator.trans(
          usingCravatar
            ? 'vlssu-flarum-cravatar.forum.settings.use-uploaded'
            : 'vlssu-flarum-cravatar.forum.settings.use-cravatar'
        )
      )
    );
  });
});
