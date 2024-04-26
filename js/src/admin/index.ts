import app from 'flarum/admin/app';
import defaultOptions from '../common/utils/defaultOptions';
import ratingOptions from '../common/utils/ratingOptions';

app.initializers.add('vlssu/flarum-cravatar', () => {
  app.extensionData
    .for('vlssu-cravatar')
    .registerSetting({
      label: app.translator.trans('vlssu-flarum-cravatar.admin.settings.proxy.title'),
      setting: 'vlssu-cravatar.proxy',
      type: 'bool',
      help: app.translator.trans('vlssu-flarum-cravatar.admin.settings.proxy.helptext'),
    })
    .registerSetting({
      label: app.translator.trans('vlssu-flarum-cravatar.admin.settings.replace-flarum-custom.title'),
      setting: 'vlssu-cravatar.replace-flarum-custom',
      type: 'bool',
      help: app.translator.trans('vlssu-flarum-cravatar.admin.settings.replace-flarum-custom.helptext'),
    })
    .registerSetting({
      label: app.translator.trans('vlssu-flarum-cravatar.admin.settings.defaults.title'),
      setting: 'vlssu-cravatar.default',
      type: 'select',
      options: defaultOptions(),
      help: app.translator.trans('vlssu-flarum-cravatar.admin.settings.defaults.helptext'),
    })
    .registerSetting({
      label: app.translator.trans('vlssu-flarum-cravatar.admin.settings.force-default.title'),
      setting: 'vlssu-cravatar.force-default',
      type: 'bool',
      help: app.translator.trans('vlssu-flarum-cravatar.admin.settings.force-default.helptext'),
    })
    .registerSetting({
      label: app.translator.trans('vlssu-flarum-cravatar.admin.settings.rating.title'),
      setting: 'vlssu-cravatar.rating',
      type: 'select',
      options: ratingOptions(),
      help: app.translator.trans('vlssu-flarum-cravatar.admin.settings.rating.helptext'),
    });
});
