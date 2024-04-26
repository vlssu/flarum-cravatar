import app from 'flarum/common/app';

let opts;

export default () =>
  opts ||
  (opts = ['mp', 'identicon', 'monsterid', 'wavatar', 'retro', 'robohash'].reduce((o, key) => {
    o[key] = app.translator.trans(`vlssu-flarum-cravatar.admin.settings.defaults.${key}_label`);

    return o;
  }, {}));
