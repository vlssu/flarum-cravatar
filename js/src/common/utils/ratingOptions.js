import app from 'flarum/common/app';

let opts;

export default () =>
  opts ||
  (opts = ['g', 'pg', 'r', 'x'].reduce((o, key) => {
    o[key] = app.translator.trans(`vlssu-flarum-cravatar.admin.settings.rating.${key}_label`);

    return o;
  }, {}));
