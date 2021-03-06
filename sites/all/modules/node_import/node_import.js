// $Id: node_import.js,v 1.1.2.1 2008/11/20 14:44:37 robrechtj Exp $

/**
 * Attaches the batch behavior to progress bars.
 */
Drupal.behaviors.nodeImport = function(context) {
  $('#node_import-progress').each(function () {
    var holder = this;
    var uri = Drupal.settings.nodeImport.uri;

    var updateCallback = function (progress, status, pb) {
      if (progress == 100) {
        pb.stopMonitoring();
        window.location = uri;
      }
    };

    var progress = new Drupal.progressBar('node_import', updateCallback, "POST");
    $(holder).append(progress.element);
    progress.startMonitoring(uri + '/continue', 10);
  });
};

