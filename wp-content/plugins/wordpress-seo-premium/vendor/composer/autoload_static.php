<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita4e60d91fbab5fedd0b3a9f6fc0a3229
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'WPSEO_CLI_Premium_Requirement' => __DIR__ . '/../..' . '/cli/cli-premium-requirement.php',
        'WPSEO_CLI_Redirect_Base_Command' => __DIR__ . '/../..' . '/cli/cli-redirect-base-command.php',
        'WPSEO_CLI_Redirect_Command_Namespace' => __DIR__ . '/../..' . '/cli/cli-redirect-command-namespace.php',
        'WPSEO_CLI_Redirect_Create_Command' => __DIR__ . '/../..' . '/cli/cli-redirect-create-command.php',
        'WPSEO_CLI_Redirect_Delete_Command' => __DIR__ . '/../..' . '/cli/cli-redirect-delete-command.php',
        'WPSEO_CLI_Redirect_Follow_Command' => __DIR__ . '/../..' . '/cli/cli-redirect-follow-command.php',
        'WPSEO_CLI_Redirect_Has_Command' => __DIR__ . '/../..' . '/cli/cli-redirect-has-command.php',
        'WPSEO_CLI_Redirect_List_Command' => __DIR__ . '/../..' . '/cli/cli-redirect-list-command.php',
        'WPSEO_CLI_Redirect_Update_Command' => __DIR__ . '/../..' . '/cli/cli-redirect-update-command.php',
        'WPSEO_Custom_Fields_Plugin' => __DIR__ . '/../..' . '/classes/custom-fields-plugin.php',
        'WPSEO_Executable_Redirect' => __DIR__ . '/../..' . '/classes/redirect/executable-redirect.php',
        'WPSEO_Export_Keywords_CSV' => __DIR__ . '/../..' . '/classes/export/export-keywords-csv.php',
        'WPSEO_Export_Keywords_Post_Presenter' => __DIR__ . '/../..' . '/classes/export/export-keywords-post-presenter.php',
        'WPSEO_Export_Keywords_Post_Query' => __DIR__ . '/../..' . '/classes/export/export-keywords-post-query.php',
        'WPSEO_Export_Keywords_Presenter' => __DIR__ . '/../..' . '/classes/export/export-keywords-presenter-interface.php',
        'WPSEO_Export_Keywords_Query' => __DIR__ . '/../..' . '/classes/export/export-keywords-query-interface.php',
        'WPSEO_Export_Keywords_Term_Presenter' => __DIR__ . '/../..' . '/classes/export/export-keywords-term-presenter.php',
        'WPSEO_Export_Keywords_Term_Query' => __DIR__ . '/../..' . '/classes/export/export-keywords-term-query.php',
        'WPSEO_Facebook_Profile' => __DIR__ . '/../..' . '/classes/facebook-profile.php',
        'WPSEO_Metabox_Link_Suggestions' => __DIR__ . '/../..' . '/classes/metabox-link-suggestions.php',
        'WPSEO_Multi_Keyword' => __DIR__ . '/../..' . '/classes/multi-keyword.php',
        'WPSEO_Post_Watcher' => __DIR__ . '/../..' . '/classes/post-watcher.php',
        'WPSEO_Premium' => __DIR__ . '/../..' . '/premium.php',
        'WPSEO_Premium_Asset_JS_L10n' => __DIR__ . '/../..' . '/classes/premium-asset-js-l10n.php',
        'WPSEO_Premium_Assets' => __DIR__ . '/../..' . '/classes/premium-assets.php',
        'WPSEO_Premium_Expose_Shortlinks' => __DIR__ . '/../..' . '/classes/premium-expose-shortlinks.php',
        'WPSEO_Premium_Import_Manager' => __DIR__ . '/../..' . '/classes/premium-import-manager.php',
        'WPSEO_Premium_Javascript_Strings' => __DIR__ . '/../..' . '/classes/premium-javascript-strings.php',
        'WPSEO_Premium_Keyword_Export_Manager' => __DIR__ . '/../..' . '/classes/premium-keyword-export-manager.php',
        'WPSEO_Premium_Metabox' => __DIR__ . '/../..' . '/classes/premium-metabox.php',
        'WPSEO_Premium_Option' => __DIR__ . '/../..' . '/classes/premium-option.php',
        'WPSEO_Premium_Orphaned_Content_Support' => __DIR__ . '/../..' . '/classes/premium-orphaned-content-support.php',
        'WPSEO_Premium_Orphaned_Content_Utils' => __DIR__ . '/../..' . '/classes/premium-orphaned-content-utils.php',
        'WPSEO_Premium_Orphaned_Post_Filter' => __DIR__ . '/../..' . '/classes/premium-orphaned-post-filter.php',
        'WPSEO_Premium_Orphaned_Post_Query' => __DIR__ . '/../..' . '/classes/premium-orphaned-post-query.php',
        'WPSEO_Premium_Prominent_Words_Language_Support' => __DIR__ . '/../..' . '/classes/deprecated/premium-prominent-words-language-support.php',
        'WPSEO_Premium_Prominent_Words_Recalculation' => __DIR__ . '/../..' . '/classes/premium-prominent-words-recalculation.php',
        'WPSEO_Premium_Prominent_Words_Recalculation_Endpoint' => __DIR__ . '/../..' . '/classes/deprecated/premium-prominent-words-recalculation-endpoint.php',
        'WPSEO_Premium_Prominent_Words_Recalculation_Notifier' => __DIR__ . '/../..' . '/classes/deprecated/premium-prominent-words-recalculation-notifier.php',
        'WPSEO_Premium_Prominent_Words_Recalculation_Service' => __DIR__ . '/../..' . '/classes/deprecated/premium-prominent-words-recalculation-service.php',
        'WPSEO_Premium_Prominent_Words_Support' => __DIR__ . '/../..' . '/classes/premium-prominent-words-support.php',
        'WPSEO_Premium_Prominent_Words_Unindexed_Post_Query' => __DIR__ . '/../..' . '/classes/premium-prominent-words-unindexed-post-query.php',
        'WPSEO_Premium_Prominent_Words_Versioning' => __DIR__ . '/../..' . '/classes/premium-prominent-words-versioning.php',
        'WPSEO_Premium_Redirect_EndPoint' => __DIR__ . '/../..' . '/classes/premium-redirect-endpoint.php',
        'WPSEO_Premium_Redirect_Export_Manager' => __DIR__ . '/../..' . '/classes/premium-redirect-export-manager.php',
        'WPSEO_Premium_Redirect_Option' => __DIR__ . '/../..' . '/classes/premium-redirect-option.php',
        'WPSEO_Premium_Redirect_Service' => __DIR__ . '/../..' . '/classes/premium-redirect-service.php',
        'WPSEO_Premium_Redirect_Undo_EndPoint' => __DIR__ . '/../..' . '/classes/redirect-undo-endpoint.php',
        'WPSEO_Premium_Register_Capabilities' => __DIR__ . '/../..' . '/classes/premium-register-capabilities.php',
        'WPSEO_Premium_Stale_Cornerstone_Content_Filter' => __DIR__ . '/../..' . '/classes/premium-stale-cornerstone-content-filter.php',
        'WPSEO_Product_Premium' => __DIR__ . '/../..' . '/classes/product-premium.php',
        'WPSEO_Redirect' => __DIR__ . '/../..' . '/classes/redirect/redirect.php',
        'WPSEO_Redirect_Abstract_Loader' => __DIR__ . '/../..' . '/classes/redirect/loaders/redirect-abstract-loader.php',
        'WPSEO_Redirect_Abstract_Validation' => __DIR__ . '/../..' . '/classes/redirect/validation/redirect-abstract-validation.php',
        'WPSEO_Redirect_Accessible_Validation' => __DIR__ . '/../..' . '/classes/redirect/validation/redirect-accessible-validation.php',
        'WPSEO_Redirect_Ajax' => __DIR__ . '/../..' . '/classes/redirect/redirect-ajax.php',
        'WPSEO_Redirect_Apache_Exporter' => __DIR__ . '/../..' . '/classes/redirect/exporters/redirect-apache-exporter.php',
        'WPSEO_Redirect_CSV_Exporter' => __DIR__ . '/../..' . '/classes/redirect/exporters/redirect-csv-exporter.php',
        'WPSEO_Redirect_CSV_Loader' => __DIR__ . '/../..' . '/classes/redirect/loaders/redirect-csv-loader.php',
        'WPSEO_Redirect_Endpoint_Validation' => __DIR__ . '/../..' . '/classes/redirect/validation/redirect-endpoint-validation.php',
        'WPSEO_Redirect_Exporter' => __DIR__ . '/../..' . '/classes/redirect/exporters/redirect-exporter-interface.php',
        'WPSEO_Redirect_File_Exporter' => __DIR__ . '/../..' . '/classes/redirect/exporters/redirect-file-exporter.php',
        'WPSEO_Redirect_File_Util' => __DIR__ . '/../..' . '/classes/redirect/redirect-file-util.php',
        'WPSEO_Redirect_Form_Presenter' => __DIR__ . '/../..' . '/classes/redirect/presenters/redirect-form-presenter.php',
        'WPSEO_Redirect_Formats' => __DIR__ . '/../..' . '/classes/redirect/redirect-formats.php',
        'WPSEO_Redirect_Formatter' => __DIR__ . '/../..' . '/classes/redirect/redirect-formatter.php',
        'WPSEO_Redirect_HTAccess_Loader' => __DIR__ . '/../..' . '/classes/redirect/loaders/redirect-htaccess-loader.php',
        'WPSEO_Redirect_Handler' => __DIR__ . '/../..' . '/src/deprecated/redirect-handler.php',
        'WPSEO_Redirect_Htaccess_Exporter' => __DIR__ . '/../..' . '/classes/redirect/exporters/redirect-htaccess-exporter.php',
        'WPSEO_Redirect_Htaccess_Util' => __DIR__ . '/../..' . '/classes/redirect/redirect-htaccess-util.php',
        'WPSEO_Redirect_Import_Exception' => __DIR__ . '/../..' . '/classes/redirect/redirect-import-exception.php',
        'WPSEO_Redirect_Importer' => __DIR__ . '/../..' . '/classes/redirect/redirect-importer.php',
        'WPSEO_Redirect_Loader' => __DIR__ . '/../..' . '/classes/redirect/loaders/redirect-loader-interface.php',
        'WPSEO_Redirect_Manager' => __DIR__ . '/../..' . '/classes/redirect/redirect-manager.php',
        'WPSEO_Redirect_Nginx_Exporter' => __DIR__ . '/../..' . '/classes/redirect/exporters/redirect-nginx-exporter.php',
        'WPSEO_Redirect_Option' => __DIR__ . '/../..' . '/classes/redirect/redirect-option.php',
        'WPSEO_Redirect_Option_Exporter' => __DIR__ . '/../..' . '/classes/redirect/exporters/redirect-option-exporter.php',
        'WPSEO_Redirect_Page' => __DIR__ . '/../..' . '/classes/redirect/redirect-page.php',
        'WPSEO_Redirect_Page_Presenter' => __DIR__ . '/../..' . '/classes/redirect/presenters/redirect-page-presenter.php',
        'WPSEO_Redirect_Presence_Validation' => __DIR__ . '/../..' . '/classes/redirect/validation/redirect-presence-validation.php',
        'WPSEO_Redirect_Presenter' => __DIR__ . '/../..' . '/classes/redirect/presenters/redirect-presenter-interface.php',
        'WPSEO_Redirect_Quick_Edit_Presenter' => __DIR__ . '/../..' . '/classes/redirect/presenters/redirect-quick-edit-presenter.php',
        'WPSEO_Redirect_Redirection_Loader' => __DIR__ . '/../..' . '/classes/redirect/loaders/redirect-redirection-loader.php',
        'WPSEO_Redirect_Relative_Origin_Validation' => __DIR__ . '/../..' . '/classes/redirect/validation/redirect-relative-origin-validation.php',
        'WPSEO_Redirect_Safe_Redirect_Loader' => __DIR__ . '/../..' . '/classes/redirect/loaders/redirect-safe-redirect-loader.php',
        'WPSEO_Redirect_Self_Redirect_Validation' => __DIR__ . '/../..' . '/classes/redirect/validation/redirect-self-redirect-validation.php',
        'WPSEO_Redirect_Settings_Presenter' => __DIR__ . '/../..' . '/classes/redirect/presenters/redirect-settings-presenter.php',
        'WPSEO_Redirect_Simple_301_Redirect_Loader' => __DIR__ . '/../..' . '/classes/redirect/loaders/redirect-simple-301-redirect-loader.php',
        'WPSEO_Redirect_Sitemap_Filter' => __DIR__ . '/../..' . '/classes/redirect/redirect-sitemap-filter.php',
        'WPSEO_Redirect_Subdirectory_Validation' => __DIR__ . '/../..' . '/classes/redirect/validation/redirect-subdirectory-validation.php',
        'WPSEO_Redirect_Tab_Presenter' => __DIR__ . '/../..' . '/classes/redirect/presenters/redirect-tab-presenter.php',
        'WPSEO_Redirect_Table' => __DIR__ . '/../..' . '/classes/redirect/redirect-table.php',
        'WPSEO_Redirect_Table_Presenter' => __DIR__ . '/../..' . '/classes/redirect/presenters/redirect-table-presenter.php',
        'WPSEO_Redirect_Types' => __DIR__ . '/../..' . '/classes/redirect/redirect-types.php',
        'WPSEO_Redirect_Uniqueness_Validation' => __DIR__ . '/../..' . '/classes/redirect/validation/redirect-uniqueness-validation.php',
        'WPSEO_Redirect_Upgrade' => __DIR__ . '/../..' . '/classes/redirect/redirect-upgrade.php',
        'WPSEO_Redirect_Url_Formatter' => __DIR__ . '/../..' . '/classes/redirect/redirect-url-formatter.php',
        'WPSEO_Redirect_Util' => __DIR__ . '/../..' . '/classes/redirect/redirect-util.php',
        'WPSEO_Redirect_Validation' => __DIR__ . '/../..' . '/classes/redirect/validation/redirect-validation-interface.php',
        'WPSEO_Redirect_Validator' => __DIR__ . '/../..' . '/classes/redirect/redirect-validator.php',
        'WPSEO_Social_Previews' => __DIR__ . '/../..' . '/classes/social-previews.php',
        'WPSEO_Term_Watcher' => __DIR__ . '/../..' . '/classes/term-watcher.php',
        'WPSEO_Upgrade_Manager' => __DIR__ . '/../..' . '/classes/upgrade-manager.php',
        'WPSEO_Validation_Error' => __DIR__ . '/../..' . '/classes/validation-error.php',
        'WPSEO_Validation_Result' => __DIR__ . '/../..' . '/classes/validation-result.php',
        'WPSEO_Validation_Warning' => __DIR__ . '/../..' . '/classes/validation-warning.php',
        'WPSEO_Watcher' => __DIR__ . '/../..' . '/classes/watcher.php',
        'Yoast\\WP\\SEO\\Actions\\Link_Suggestions_Action' => __DIR__ . '/../..' . '/src/deprecated/actions/renamed-classes.php',
        'Yoast\\WP\\SEO\\Actions\\Prominent_Words\\Complete_Action' => __DIR__ . '/../..' . '/src/deprecated/actions/prominent-words/renamed-classes.php',
        'Yoast\\WP\\SEO\\Actions\\Prominent_Words\\Content_Action' => __DIR__ . '/../..' . '/src/deprecated/actions/prominent-words/renamed-classes.php',
        'Yoast\\WP\\SEO\\Actions\\Prominent_Words\\Save_Action' => __DIR__ . '/../..' . '/src/deprecated/actions/prominent-words/renamed-classes.php',
        'Yoast\\WP\\SEO\\Actions\\Zapier_Action' => __DIR__ . '/../..' . '/src/deprecated/actions/renamed-classes.php',
        'Yoast\\WP\\SEO\\Conditionals\\Zapier_Enabled_Conditional' => __DIR__ . '/../..' . '/src/deprecated/conditionals/renamed-classes.php',
        'Yoast\\WP\\SEO\\Config\\Migrations\\WpYoastPremiumImprovedInternalLinking' => __DIR__ . '/../..' . '/src/config/migrations/20190715101200_WpYoastPremiumImprovedInternalLinking.php',
        'Yoast\\WP\\SEO\\Database\\Migration_Runner_Premium' => __DIR__ . '/../..' . '/src/deprecated/database/renamed-classes.php',
        'Yoast\\WP\\SEO\\Helpers\\Prominent_Words_Helper' => __DIR__ . '/../..' . '/src/deprecated/helpers/renamed-classes.php',
        'Yoast\\WP\\SEO\\Helpers\\Zapier_Helper' => __DIR__ . '/../..' . '/src/deprecated/helpers/renamed-classes.php',
        'Yoast\\WP\\SEO\\Initializers\\Redirect_Handler' => __DIR__ . '/../..' . '/src/deprecated/initializers/renamed-classes.php',
        'Yoast\\WP\\SEO\\Integrations\\Admin\\Prominent_Words_Notification' => __DIR__ . '/../..' . '/src/deprecated/integrations/admin/prominent-words-notification.php',
        'Yoast\\WP\\SEO\\Integrations\\Blocks\\Block_Patterns' => __DIR__ . '/../..' . '/src/integrations/blocks/block-patterns.php',
        'Yoast\\WP\\SEO\\Integrations\\Blocks\\Estimated_Reading_Time_Block' => __DIR__ . '/../..' . '/src/deprecated/integrations/blocks/renamed-classes.php',
        'Yoast\\WP\\SEO\\Integrations\\Blocks\\Job_Posting_Block' => __DIR__ . '/../..' . '/src/integrations/blocks/job-posting-block.php',
        'Yoast\\WP\\SEO\\Integrations\\Blocks\\Related_Links_Block' => __DIR__ . '/../..' . '/src/deprecated/integrations/blocks/renamed-classes.php',
        'Yoast\\WP\\SEO\\Integrations\\Blocks\\Schema_Blocks' => __DIR__ . '/../..' . '/src/deprecated/integrations/blocks/renamed-classes.php',
        'Yoast\\WP\\SEO\\Integrations\\Blocks\\Siblings_Block' => __DIR__ . '/../..' . '/classes/blocks/siblings-block.php',
        'Yoast\\WP\\SEO\\Integrations\\Blocks\\Subpages_Block' => __DIR__ . '/../..' . '/classes/blocks/subpages-block.php',
        'Yoast\\WP\\SEO\\Integrations\\Third_Party\\Elementor_Premium' => __DIR__ . '/../..' . '/src/deprecated/integrations/third-party/renamed-classes.php',
        'Yoast\\WP\\SEO\\Integrations\\Third_Party\\TranslationsPress' => __DIR__ . '/../..' . '/src/integrations/third-party/translationspress.php',
        'Yoast\\WP\\SEO\\Integrations\\Third_Party\\Zapier' => __DIR__ . '/../..' . '/src/deprecated/integrations/third-party/renamed-classes.php',
        'Yoast\\WP\\SEO\\Integrations\\Third_Party\\Zapier_Classic_Editor' => __DIR__ . '/../..' . '/src/deprecated/integrations/third-party/renamed-classes.php',
        'Yoast\\WP\\SEO\\Integrations\\Third_Party\\Zapier_Trigger' => __DIR__ . '/../..' . '/src/deprecated/integrations/third-party/renamed-classes.php',
        'Yoast\\WP\\SEO\\Integrations\\Watchers\\Premium_Option_Wpseo_Watcher' => __DIR__ . '/../..' . '/src/deprecated/integrations/watchers/renamed-classes.php',
        'Yoast\\WP\\SEO\\Integrations\\Watchers\\Zapier_APIKey_Reset_Watcher' => __DIR__ . '/../..' . '/src/deprecated/integrations/watchers/renamed-classes.php',
        'Yoast\\WP\\SEO\\Models\\Prominent_Words' => __DIR__ . '/../..' . '/src/models/prominent-words.php',
        'Yoast\\WP\\SEO\\Premium\\Actions\\Link_Suggestions_Action' => __DIR__ . '/../..' . '/src/actions/link-suggestions-action.php',
        'Yoast\\WP\\SEO\\Premium\\Actions\\Prominent_Words\\Complete_Action' => __DIR__ . '/../..' . '/src/actions/prominent-words/complete-action.php',
        'Yoast\\WP\\SEO\\Premium\\Actions\\Prominent_Words\\Content_Action' => __DIR__ . '/../..' . '/src/actions/prominent-words/content-action.php',
        'Yoast\\WP\\SEO\\Premium\\Actions\\Prominent_Words\\Save_Action' => __DIR__ . '/../..' . '/src/actions/prominent-words/save-action.php',
        'Yoast\\WP\\SEO\\Premium\\Actions\\Zapier_Action' => __DIR__ . '/../..' . '/src/actions/zapier-action.php',
        'Yoast\\WP\\SEO\\Premium\\Addon_Installer' => __DIR__ . '/../..' . '/src/addon-installer.php',
        'Yoast\\WP\\SEO\\Premium\\Conditionals\\Algolia_Enabled_Conditional' => __DIR__ . '/../..' . '/src/conditionals/algolia-enabled-conditional.php',
        'Yoast\\WP\\SEO\\Premium\\Conditionals\\Zapier_Enabled_Conditional' => __DIR__ . '/../..' . '/src/conditionals/zapier-enabled-conditional.php',
        'Yoast\\WP\\SEO\\Premium\\Config\\Badge_Group_Names' => __DIR__ . '/../..' . '/src/config/badge-group-names.php',
        'Yoast\\WP\\SEO\\Premium\\Config\\Migrations\\AddIndexOnIndexableIdAndStem' => __DIR__ . '/../..' . '/src/config/migrations/20210827093024_AddIndexOnIndexableIdAndStem.php',
        'Yoast\\WP\\SEO\\Premium\\Database\\Migration_Runner_Premium' => __DIR__ . '/../..' . '/src/database/migration-runner-premium.php',
        'Yoast\\WP\\SEO\\Premium\\Generated\\Cached_Container' => __DIR__ . '/../..' . '/src/generated/container.php',
        'Yoast\\WP\\SEO\\Premium\\Helpers\\Prominent_Words_Helper' => __DIR__ . '/../..' . '/src/helpers/prominent-words-helper.php',
        'Yoast\\WP\\SEO\\Premium\\Helpers\\Zapier_Helper' => __DIR__ . '/../..' . '/src/helpers/zapier-helper.php',
        'Yoast\\WP\\SEO\\Premium\\Initializers\\Plugin' => __DIR__ . '/../..' . '/src/initializers/plugin.php',
        'Yoast\\WP\\SEO\\Premium\\Initializers\\Redirect_Handler' => __DIR__ . '/../..' . '/src/initializers/redirect-handler.php',
        'Yoast\\WP\\SEO\\Premium\\Integrations\\Abstract_OpenGraph_Integration' => __DIR__ . '/../..' . '/src/integrations/abstract-opengraph-integration.php',
        'Yoast\\WP\\SEO\\Premium\\Integrations\\Admin\\Plugin_Links_Integration' => __DIR__ . '/../..' . '/src/integrations/admin/plugin-links-integration.php',
        'Yoast\\WP\\SEO\\Premium\\Integrations\\Admin\\Prominent_Words\\Indexing_Integration' => __DIR__ . '/../..' . '/src/integrations/admin/prominent-words/indexing-integration.php',
        'Yoast\\WP\\SEO\\Premium\\Integrations\\Admin\\Prominent_Words\\Metabox_Integration' => __DIR__ . '/../..' . '/src/integrations/admin/prominent-words/metabox-integration.php',
        'Yoast\\WP\\SEO\\Premium\\Integrations\\Admin\\Thank_You_Page_Integration' => __DIR__ . '/../..' . '/src/integrations/admin/thank-you-page-integration.php',
        'Yoast\\WP\\SEO\\Premium\\Integrations\\Admin\\User_Profile_Integration' => __DIR__ . '/../..' . '/src/integrations/admin/user-profile-integration.php',
        'Yoast\\WP\\SEO\\Premium\\Integrations\\Admin\\Workouts_Integration' => __DIR__ . '/../..' . '/src/integrations/admin/workouts-integration.php',
        'Yoast\\WP\\SEO\\Premium\\Integrations\\Blocks\\Estimated_Reading_Time_Block' => __DIR__ . '/../..' . '/src/integrations/blocks/estimated-reading-time-block.php',
        'Yoast\\WP\\SEO\\Premium\\Integrations\\Blocks\\Related_Links_Block' => __DIR__ . '/../..' . '/src/integrations/blocks/related-links-block.php',
        'Yoast\\WP\\SEO\\Premium\\Integrations\\Blocks\\Schema_Blocks' => __DIR__ . '/../..' . '/src/integrations/blocks/schema-blocks.php',
        'Yoast\\WP\\SEO\\Premium\\Integrations\\Cleanup_Integration' => __DIR__ . '/../..' . '/src/integrations/cleanup-integration.php',
        'Yoast\\WP\\SEO\\Premium\\Integrations\\OpenGraph_Author_Archive' => __DIR__ . '/../..' . '/src/integrations/opengraph-author-archive.php',
        'Yoast\\WP\\SEO\\Premium\\Integrations\\OpenGraph_Date_Archive' => __DIR__ . '/../..' . '/src/integrations/opengraph-date-archive.php',
        'Yoast\\WP\\SEO\\Premium\\Integrations\\OpenGraph_PostType_Archive' => __DIR__ . '/../..' . '/src/integrations/opengraph-posttype-archive.php',
        'Yoast\\WP\\SEO\\Premium\\Integrations\\OpenGraph_Post_Type' => __DIR__ . '/../..' . '/src/integrations/opengraph-post-type.php',
        'Yoast\\WP\\SEO\\Premium\\Integrations\\OpenGraph_Term_Archive' => __DIR__ . '/../..' . '/src/integrations/opengraph-term-archive.php',
        'Yoast\\WP\\SEO\\Premium\\Integrations\\Third_Party\\Algolia' => __DIR__ . '/../..' . '/src/integrations/third-party/algolia.php',
        'Yoast\\WP\\SEO\\Premium\\Integrations\\Third_Party\\Elementor_Premium' => __DIR__ . '/../..' . '/src/integrations/third-party/elementor-premium.php',
        'Yoast\\WP\\SEO\\Premium\\Integrations\\Third_Party\\Zapier' => __DIR__ . '/../..' . '/src/integrations/third-party/zapier.php',
        'Yoast\\WP\\SEO\\Premium\\Integrations\\Third_Party\\Zapier_Classic_Editor' => __DIR__ . '/../..' . '/src/integrations/third-party/zapier-classic-editor.php',
        'Yoast\\WP\\SEO\\Premium\\Integrations\\Third_Party\\Zapier_Trigger' => __DIR__ . '/../..' . '/src/integrations/third-party/zapier-trigger.php',
        'Yoast\\WP\\SEO\\Premium\\Integrations\\Upgrade_Integration' => __DIR__ . '/../..' . '/src/integrations/upgrade-integration.php',
        'Yoast\\WP\\SEO\\Premium\\Integrations\\User_Profile_Integration' => __DIR__ . '/../..' . '/src/integrations/user-profile-integration.php',
        'Yoast\\WP\\SEO\\Premium\\Integrations\\Watchers\\Premium_Option_Wpseo_Watcher' => __DIR__ . '/../..' . '/src/integrations/watchers/premium-option-wpseo-watcher.php',
        'Yoast\\WP\\SEO\\Premium\\Integrations\\Watchers\\Zapier_APIKey_Reset_Watcher' => __DIR__ . '/../..' . '/src/integrations/watchers/zapier-apikey-reset-watcher.php',
        'Yoast\\WP\\SEO\\Premium\\Main' => __DIR__ . '/../..' . '/src/main.php',
        'Yoast\\WP\\SEO\\Premium\\Repositories\\Prominent_Words_Repository' => __DIR__ . '/../..' . '/src/repositories/prominent-words-repository.php',
        'Yoast\\WP\\SEO\\Premium\\Routes\\Link_Suggestions_Route' => __DIR__ . '/../..' . '/src/routes/link-suggestions-route.php',
        'Yoast\\WP\\SEO\\Premium\\Routes\\Prominent_Words_Route' => __DIR__ . '/../..' . '/src/routes/prominent-words-route.php',
        'Yoast\\WP\\SEO\\Premium\\Routes\\Workouts_Route' => __DIR__ . '/../..' . '/src/routes/workouts-route.php',
        'Yoast\\WP\\SEO\\Premium\\Routes\\Zapier_Route' => __DIR__ . '/../..' . '/src/routes/zapier-route.php',
        'Yoast\\WP\\SEO\\Premium\\Surfaces\\Helpers_Surface' => __DIR__ . '/../..' . '/src/surfaces/helpers-surface.php',
        'Yoast\\WP\\SEO\\Premium\\WordPress\\Wrapper' => __DIR__ . '/../..' . '/src/wordpress/wrapper.php',
        'Yoast\\WP\\SEO\\Presenters\\Admin\\Prominent_Words\\Indexation_List_Item_Presenter' => __DIR__ . '/../..' . '/src/deprecated/presenters/indexation-list-item-presenter.php',
        'Yoast\\WP\\SEO\\Presenters\\Admin\\Prominent_Words\\Indexation_Modal_Presenter' => __DIR__ . '/../..' . '/src/deprecated/presenters/indexation-modal-presenter.php',
        'Yoast\\WP\\SEO\\Presenters\\Prominent_Words_Notification' => __DIR__ . '/../..' . '/src/deprecated/presenters/prominent-words-notification.php',
        'Yoast\\WP\\SEO\\Repositories\\Prominent_Words_Repository' => __DIR__ . '/../..' . '/src/deprecated/repositories/renamed-classes.php',
        'Yoast\\WP\\SEO\\Routes\\Link_Suggestions_Route' => __DIR__ . '/../..' . '/src/deprecated/routes/renamed-classes.php',
        'Yoast\\WP\\SEO\\Routes\\Prominent_Words_Route' => __DIR__ . '/../..' . '/src/deprecated/routes/renamed-classes.php',
        'Yoast\\WP\\SEO\\Routes\\Zapier_Route' => __DIR__ . '/../..' . '/src/deprecated/routes/renamed-classes.php',
        'Yoast\\WP\\SEO\\Schema_Templates\\Block_Patterns\\Block_Pattern' => __DIR__ . '/../..' . '/src/schema-templates/block-patterns/block-pattern.php',
        'Yoast\\WP\\SEO\\Schema_Templates\\Block_Patterns\\Block_Pattern_Categories' => __DIR__ . '/../..' . '/src/schema-templates/block-patterns/block-pattern-categories.php',
        'Yoast\\WP\\SEO\\Schema_Templates\\Block_Patterns\\Block_Pattern_Keywords' => __DIR__ . '/../..' . '/src/schema-templates/block-patterns/block-pattern-keywords.php',
        'Yoast\\WP\\SEO\\Schema_Templates\\Block_Patterns\\Job_Posting_Base_Pattern' => __DIR__ . '/../..' . '/src/schema-templates/block-patterns/job-posting-base-pattern.php',
        'Yoast\\WP\\SEO\\Schema_Templates\\Block_Patterns\\Job_Posting_One_Column' => __DIR__ . '/../..' . '/src/schema-templates/block-patterns/job-posting-one-column.php',
        'Yoast\\WP\\SEO\\Schema_Templates\\Block_Patterns\\Job_Posting_Two_Columns' => __DIR__ . '/../..' . '/src/schema-templates/block-patterns/job-posting-two-columns.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita4e60d91fbab5fedd0b3a9f6fc0a3229::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita4e60d91fbab5fedd0b3a9f6fc0a3229::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita4e60d91fbab5fedd0b3a9f6fc0a3229::$classMap;

        }, null, ClassLoader::class);
    }
}
