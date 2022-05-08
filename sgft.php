<?php

require_once 'sgft.civix.php';
// phpcs:disable
use CRM_Sgft_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function sgft_civicrm_config(&$config) {
  _sgft_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function sgft_civicrm_install() {
  _sgft_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function sgft_civicrm_postInstall() {
  _sgft_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function sgft_civicrm_uninstall() {
  _sgft_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function sgft_civicrm_enable() {
  _sgft_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function sgft_civicrm_disable() {
  _sgft_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function sgft_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _sgft_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function sgft_civicrm_entityTypes(&$entityTypes) {
  _sgft_civix_civicrm_entityTypes($entityTypes);
}

/**
 * @param \CRM_Core_Page $page
 */
function sgft_civicrm_pageRun(&$page) {
  // Add js files to pages
  $pageName = get_class($page);
  $jsFile = "js/{$pageName}.js";
  if (file_exists(E::path($jsFile))) {
    \Civi::resources()->addScriptFile(E::SHORT_NAME, $jsFile, 'page-footer');
  }
}

/**
 * Intercept form functions
 * @param string $formName
 * @param CRM_Core_Form $form
 */
function sgft_civicrm_buildForm($formName, &$form) {
  $jsFile = NULL;
  if (!empty($form->_id)) {
    $jsFile = "js/{$formName}_{$form->_id}.js";
    if (!file_exists(E::path($jsFile))) {
      $jsFile = NULL;
    }
  }
  if (!$jsFile) {
    $jsFile = "js/{$formName}.js";
    if (!file_exists(E::path($jsFile))) {
      return;
    }
  }
  \Civi::resources()->addScriptFile(E::SHORT_NAME, $jsFile, 'page-footer');
}
