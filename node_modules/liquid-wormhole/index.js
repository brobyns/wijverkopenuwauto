/* jshint node: true */
'use strict';

var filterInitializers = require('fastboot-filter-initializers');

module.exports = {
  name: 'liquid-wormhole',

  preconcatTree: function(tree) {
    return filterInitializers(tree, this.app.name);
  }
};
