import app from 'flarum/forum/app';
import Model from 'flarum/common/Model';
import { extend } from 'flarum/common/extend';
import AvatarEditor from 'flarum/forum/components/AvatarEditor';

app.initializers.add('vlssu/flarum-cravatar', () => {
  app.store.models.users.prototype.cravatar = Model.attribute('cravatar');

  extend(AvatarEditor.prototype, 'controlItems', function (items) {
    const user = this.attrs.user;
    // items.remove('upload');

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
  });
});
