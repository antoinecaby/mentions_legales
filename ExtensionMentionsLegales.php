<?php
/**
* Plugin Name: ExtensionMentionsLégales
* Plugin URI: https://extensions.local/plugins/ExtensionMentionsLegales/
* Description: Extension Mentions légales
* Version: 1.0
* Requires at least: 5.2
* Requires PHP: 7.2
* Author: Antoine Caby
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: ExtensionMentionsLegales
* Domain Path: languages/
*/

defined( 'ABSPATH' ) || die();

add_action( 'admin_menu', 'wpcookbook_settings_menu' );
/**
* Registers our new menu item
*/
function wpcookbook_settings_menu() {

    $hookname = add_menu_page(
        __( 'Réglages pour les mentions légales', '27-settings' ), // Page title 
        __( 'Mentions Légales', '27-settings' ), // Menu title
        'manage_options', // Capabilities
        'wpcookbook-page', // Slug
        'wpcookbook_menu_page_callback', // Display callback
        'dashicons-book-alt', // Icon
        66 // Priority/position. Just after 'Plugins'
    );
}

/**
* Displays our new settings page content 
*/

function wpcookbook_menu_page_callback(){
    ?>
        <div class="wrap">
            <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
            <form action ="<?php $post_slug3 ?>" method="POST">
                <?php
                    settings_fields( 'wpcookbook' );
                    do_settings_sections( 'wpcookbook-page' );
                    submit_button();
                ?>
            </form>
        </div>
    <?php
}

add_action( 'admin_init', 'wpcookbook_register_settings' ); 

/**
* Registers our new settings
*/

function wpcookbook_register_settings(){
    register_setting(
        'wpcookbook', // Group Name
        'wpcookbook_text_field_name', // Setting Name
        'sanitize_text_field', // Sanitize callback
    );
    add_settings_section(
        'wpcookbook-first-section', // Section ID 
        __( 'Identité de la société', '27-settings' ), // Title
        'wpcookbook_section_display', // Callback 
        'wpcookbook-page' // Page
    );
    add_settings_field(
        'wpcookbook_text_field_name', // Field ID
        __( 'Nom de la société', '27-settings' ), // Title
        'wpcookbook_text_field_name_display', // Callback
        'wpcookbook-page', // Page
        'wpcookbook-first-section', // Section
        array(
            'label_for' => 'wpcookbook_text_field_name', // Label
            'class' => 'wpcookbook-text-field_name', // CSS Classname
        )
    );

    register_setting(
        'wpcookbook', // Group Name
        'wpcookbook_text_field_address', // Setting Name
        'sanitize_text_field', // Sanitize callback
    );
    add_settings_field(
        'wpcookbook_text_field_address', // Field ID
        __( 'Adresse', '27-settings' ), // Title
        'wpcookbook_text_field_address_display', // Callback
        'wpcookbook-page', // Page
        'wpcookbook-first-section', // Section
        array(
            'label_for' => 'wpcookbook_text_field_address', // Label
            'class' => 'wpcookbook-text-field-address', // CSS Classname
        )
    );

    register_setting(
        'wpcookbook', // Group Name
        'wpcookbook_text_field_share_capital', // Setting Name
        'sanitize_text_field', // Sanitize callback
    );
    add_settings_field(
        'wpcookbook_text_field_share_capital', // Field ID
        __( 'Capital social', '27-settings' ), // Title
        'wpcookbook_text_field_share_capital_display', // Callback
        'wpcookbook-page', // Page
        'wpcookbook-first-section', // Section
        array(
            'label_for' => 'wpcookbook_text_field_share_capital', // Label
            'class' => 'wpcookbook-text-field-share-capital', // CSS Classname
        )
    );

    register_setting(
        'wpcookbook', // Group Name
        'wpcookbook_text_field_siren', // Setting Name
        'sanitize_text_field', // Sanitize callback
    );
    add_settings_field(
        'wpcookbook_text_field_siren', // Field ID
        __( 'Numéro de Siren', '27-settings' ), // Title
        'wpcookbook_text_field_siren_display', // Callback
        'wpcookbook-page', // Page
        'wpcookbook-first-section', // Section
        array(
            'label_for' => 'wpcookbook_text_field_siren', // Label
            'class' => 'wpcookbook-text-field-siren', // CSS Classname
        )
    );

    register_setting(
        'wpcookbook', // Group Name
        'wpcookbook_text_field_tva_ic', // Setting Name
        'sanitize_text_field', // Sanitize callback
    );
    add_settings_field(
        'wpcookbook_text_field_tva_ic', // Field ID
        __( 'Numéro de TVA intra-communautaire', '27-settings' ), // Title
        'wpcookbook_text_field_tva_ic_display', // Callback
        'wpcookbook-page', // Page
        'wpcookbook-first-section', // Section
        array(
            'label_for' => 'wpcookbook_text_field_tva_ic', // Label
            'class' => 'wpcookbook-text-field-tva-ic', // CSS Classname
        )
    );

    register_setting(
        'wpcookbook', // Group Name
        'wpcookbook_text_field_website', // Setting Name
        'sanitize_text_field', // Sanitize callback
    );
    add_settings_field(
        'wpcookbook_text_field_website', // Field ID
        __( 'Adresse du site internet', '27-settings' ), // Title
        'wpcookbook_text_field_website_display', // Callback
        'wpcookbook-page', // Page
        'wpcookbook-first-section', // Section
        array(
            'label_for' => 'wpcookbook_text_field_website', // Label
            'class' => 'wpcookbook-text-field-website', // CSS Classname
        )
    );

    add_settings_section(
        'wpcookbook-second-section', // Section ID 
        __( 'Directeur de la publication', '27-settings' ), // Title
        'wpcookbook_section_display', // Callback 
        'wpcookbook-page' // Page
    );

    register_setting(
        'wpcookbook', // Group Name
        'wpcookbook_text_field_director', // Setting Name
        'sanitize_text_field', // Sanitize callback
    );
    add_settings_field(
        'wpcookbook_text_field_director', // Field ID
        __( 'Directeur de la publication', '27-settings' ), // Title
        'wpcookbook_text_field_director_display', // Callback
        'wpcookbook-page', // Page
        'wpcookbook-second-section', // Section
        array(
            'label_for' => 'wpcookbook_text_field_director', // Label
            'class' => 'wpcookbook-text-field-director', // CSS Classname
        )
    );

    register_setting(
        'wpcookbook', // Group Name
        'wpcookbook_text_field_mail', // Setting Name
        'sanitize_text_field', // Sanitize callback
    );
    add_settings_field(
        'wpcookbook_text_field_mail', // Field ID
        __( 'Adresse mail', '27-settings' ), // Title
        'wpcookbook_text_field_mail_display', // Callback
        'wpcookbook-page', // Page
        'wpcookbook-second-section', // Section
        array(
            'label_for' => 'wpcookbook_text_field_mail', // Label
            'class' => 'wpcookbook-text-field-mail', // CSS Classname
        )
    );

    add_settings_section(
        'wpcookbook-third-section', // Section ID 
        __( 'Hébergeur du site', '27-settings' ), // Title
        'wpcookbook_section_display', // Callback 
        'wpcookbook-page' // Page
    );

    register_setting(
        'wpcookbook', // Group Name
        'wpcookbook_text_field_host', // Setting Name
        'sanitize_text_field', // Sanitize callback
    );
    add_settings_field(
        'wpcookbook_text_field_host', // Field ID
        __( 'Hébergeur', '27-settings' ), // Title
        'wpcookbook_text_field_host_display', // Callback
        'wpcookbook-page', // Page
        'wpcookbook-third-section', // Section
        array(
            'label_for' => 'wpcookbook_text_field_host', // Label
            'class' => 'wpcookbook-text-field-host', // CSS Classname
        )
    );

    register_setting(
        'wpcookbook', // Group Name
        'wpcookbook_text_field_hostname', // Setting Name
        'sanitize_text_field', // Sanitize callback
    );
    add_settings_field(
        'wpcookbook_text_field_hostname', // Field ID
        __( 'Société', '27-settings' ), // Title
        'wpcookbook_text_field_hostname_display', // Callback
        'wpcookbook-page', // Page
        'wpcookbook-third-section', // Section
        array(
            'label_for' => 'wpcookbook_text_field_hostname', // Label
            'class' => 'wpcookbook-text-field-hostname', // CSS Classname
        )
    );

    register_setting(
        'wpcookbook', // Group Name
        'wpcookbook_text_field_host_website', // Setting Name
        'sanitize_text_field', // Sanitize callback
    );
    add_settings_field(
        'wpcookbook_text_field_host_website', // Field ID
        __( 'Adresse web', '27-settings' ), // Title
        'wpcookbook_text_field_host_website_display', // Callback
        'wpcookbook-page', // Page
        'wpcookbook-third-section', // Section
        array(
            'label_for' => 'wpcookbook_text_field_host_website', // Label
            'class' => 'wpcookbook-text-field-host_website', // CSS Classname
        )
    );

    register_setting(
        'wpcookbook', // Group Name
        'wpcookbook_text_field_host_address', // Setting Name
        'sanitize_text_field', // Sanitize callback
    );
    add_settings_field(
        'wpcookbook_text_field_host_address', // Field ID
        __( 'Adresse postale', '27-settings' ), // Title
        'wpcookbook_text_field_host_address_display', // Callback
        'wpcookbook-page', // Page
        'wpcookbook-third-section', // Section
        array(
            'label_for' => 'wpcookbook_text_field_host_address', // Label
            'class' => 'wpcookbook-text-field-host_address', // CSS Classname
        )
    );

    register_setting(
        'wpcookbook', // Group Name
        'wpcookbook_text_field_host_phone', // Setting Name
        'sanitize_text_field', // Sanitize callback
    );
    add_settings_field(
        'wpcookbook_text_field_host_phone', // Field ID
        __( 'Téléphone', '27-settings' ), // Title
        'wpcookbook_text_field_host_phone_display', // Callback
        'wpcookbook-page', // Page
        'wpcookbook-third-section', // Section
        array(
            'label_for' => 'wpcookbook_text_field_host_phone', // Label
            'class' => 'wpcookbook-text-field-host_phone', // CSS Classname
        )
    );

    register_setting(
        'wpcookbook', // Group Name
        'wpcookbook_text_field_host_mail', // Setting Name
        'sanitize_text_field', // Sanitize callback
    );
    add_settings_field(
        'wpcookbook_text_field_host_mail', // Field ID
        __( 'Adresse électronique', '27-settings' ), // Title
        'wpcookbook_text_field_host_mail_display', // Callback
        'wpcookbook-page', // Page
        'wpcookbook-third-section', // Section
        array(
            'label_for' => 'wpcookbook_text_field_host_mail', // Label
            'class' => 'wpcookbook-text-field-host_mail', // CSS Classname
        )
    );
}

/**
* Displays the content of the WPCookBook settings page first section
*/

function wpcookbook_section_display( $args ){
    printf( '<p><strong>%s</strong></p>', esc_html( $args[''] ) );
}

/**
* Displays our simple text field setting
*/

function wpcookbook_text_field_name_display( $args ){
    $setting = get_option( 'wpcookbook_text_field_name' );
    $value = $setting ?: '' ;
    ?>
        <input id="<?php echo esc_attr( $args['label_for'] ); ?>" type="text" name="wpcookbook_text_field_name" value="<?php echo esc_attr( $value ); ?>">
    <?php
    var_dump($setting);
    var_dump($value);
    var_dump($args);
    
}

function wpcookbook_text_field_address_display( $args ){
    $setting = get_option( 'wpcookbook_text_field_address' );
    $value = $setting ?: '' ;
    ?>
        <input id="<?php echo esc_attr( $args['label_for'] ); ?>" type="text" name="wpcookbook_text_field_address" value="<?php echo esc_attr( $value ); ?>">
    <?php
}

function wpcookbook_text_field_share_capital_display( $args ){
    $setting = get_option( 'wpcookbook_text_field_share_capital' );
    $value = $setting ?: '' ;
    ?>
        <input id="<?php echo esc_attr( $args['label_for'] ); ?>" type="text" name="wpcookbook_text_field_share_capital" value="<?php echo esc_attr( $value ); ?>">
    <?php
}

function wpcookbook_text_field_siren_display( $args ){
    $setting = get_option( 'wpcookbook_text_field_siren' );
    $value = $setting ?: '' ;
    ?>
        <input id="<?php echo esc_attr( $args['label_for'] ); ?>" type="text" name="wpcookbook_text_field_siren" value="<?php echo esc_attr( $value ); ?>">
    <?php
}

function wpcookbook_text_field_tva_ic_display( $args ){
    $setting = get_option( 'wpcookbook_text_field_tva_ic' );
    $value = $setting ?: '' ;
    ?>
        <input id="<?php echo esc_attr( $args['label_for'] ); ?>" type="text" name="wpcookbook_text_field_tva_ic" value="<?php echo esc_attr( $value ); ?>">
    <?php
}

function wpcookbook_text_field_website_display( $args ){
    $setting = get_option( 'wpcookbook_text_field_website' );
    $value = $setting ?: '' ;
    ?>
        <input id="<?php echo esc_attr( $args['label_for'] ); ?>" type="text" name="wpcookbook_text_field_website" value="<?php echo esc_attr( $value ); ?>">
    <?php
}

function wpcookbook_text_field_director_display( $args ){
    $setting = get_option( 'wpcookbook_text_field_director' );
    $value = $setting ?: '' ;
    ?>
        <input id="<?php echo esc_attr( $args['label_for'] ); ?>" type="text" name="wpcookbook_text_field_director" value="<?php echo esc_attr( $value ); ?>">
    <?php
}

function wpcookbook_text_field_mail_display( $args ){
    $setting = get_option( 'wpcookbook_text_field_mail' );
    $value = $setting ?: '' ;
    ?>
        <input id="<?php echo esc_attr( $args['label_for'] ); ?>" type="text" name="wpcookbook_text_field_mail" value="<?php echo esc_attr( $value ); ?>">
    <?php
}

function wpcookbook_text_field_host_display( $args ){
    $setting = get_option( 'wpcookbook_text_field_host' );
    $value = $setting ?: '' ;
    ?>
        <input id="<?php echo esc_attr( $args['label_for'] ); ?>" type="text" name="wpcookbook_text_field_host" value="<?php echo esc_attr( $value ); ?>">
    <?php
}

function wpcookbook_text_field_hostname_display( $args ){
    $setting = get_option( 'wpcookbook_text_field_hostname' );
    $value = $setting ?: '' ;
    ?>
        <input id="<?php echo esc_attr( $args['label_for'] ); ?>" type="text" name="wpcookbook_text_field_hostname" value="<?php echo esc_attr( $value ); ?>">
    <?php
}

function wpcookbook_text_field_host_website_display( $args ){
    $setting = get_option( 'wpcookbook_text_field_host_website' );
    $value = $setting ?: '' ;
    ?>
        <input id="<?php echo esc_attr( $args['label_for'] ); ?>" type="text" name="wpcookbook_text_field_host_website" value="<?php echo esc_attr( $value ); ?>">
    <?php
}

function wpcookbook_text_field_host_address_display( $args ){
    $setting = get_option( 'wpcookbook_text_field_host_address' );
    $value = $setting ?: '' ;
    ?>
        <input id="<?php echo esc_attr( $args['label_for'] ); ?>" type="text" name="wpcookbook_text_field_host_address" value="<?php echo esc_attr( $value ); ?>">
    <?php
}

function wpcookbook_text_field_host_phone_display( $args ){
    $setting = get_option( 'wpcookbook_text_field_host_phone' );
    $value = $setting ?: '' ;
    ?>
        <input id="<?php echo esc_attr( $args['label_for'] ); ?>" type="text" name="wpcookbook_text_field_host_phone" value="<?php echo esc_attr( $value ); ?>">
    <?php
}

function wpcookbook_text_field_host_mail_display( $args ){
    $setting = get_option( 'wpcookbook_text_field_host_mail' );
    $value = $setting ?: '' ;
    ?>
        <input id="<?php echo esc_attr( $args['label_for'] ); ?>" type="text" name="wpcookbook_text_field_host_mail" value="<?php echo esc_attr( $value ); ?>">
    <?php
}

if (function_exists('wpcookbook_section_display')){

    include 'ContenuMentionsLegales.php';
     
    $test = get_page_by_title('Mentions légales');
    $title_post = $test -> post_title;

    //var_dump($name);
    // var_dump($address);
    // var_dump($share_capital);
    // var_dump($siren);
    // var_dump($tva_ic);
    // var_dump($website);
    // var_dump($director);
    // var_dump($mail);
    // var_dump($host);
    // var_dump($hostname);
    // var_dump($host_website);
    // var_dump($host_address);
    // var_dump($host_phone);
    // var_dump($host_mail);

    if($title_post == null){
       
        function test_creation_page() {
            
            $post_data = array(
                'post_title' => 'Mentions légales',
                'post_content' => '',
                'post_status' => 'publish', // Automatically publish the post.
                'post_author' => 'ME',
                'post_type' => 'page',
                'post_category' => array( 1, 3 ) // Add it two categories.
            );

            wp_insert_post( $post_data );
        
        }
        
        add_action( 'admin_menu', 'test_creation_page', 10, 1 );
 
    }

    function contenu_post(){ 
        $setting_name = get_option( 'wpcookbook_text_field_name' );
        $value_name = $setting_name ?: '' ;
        $name = esc_attr( $value_name );

        $setting_address = get_option( 'wpcookbook_text_field_address' );
        $value_address = $setting_address ?: '' ;
        $address = esc_attr( $value_address );

        $setting_share_capital = get_option( 'wpcookbook_text_field_share_capital' );
        $value_share_capital = $setting_share_capital ?: '' ;
        $share_capital = esc_attr( $value_share_capital );

        $setting_siren = get_option( 'wpcookbook_text_field_siren' );
        $value_siren = $setting_siren ?: '' ;
        $siren = esc_attr( $value_siren );

        $setting_tva_ic = get_option( 'wpcookbook_text_field_tva_ic' );
        $value_tva_ic = $setting_tva_ic ?: '' ;
        $tva_ic = esc_attr( $value_tva_ic );

        $setting_website = get_option( 'wpcookbook_text_field_website' );
        $value_website = $setting_website ?: '' ;
        $website = esc_attr( $value_website );

        $setting_director = get_option( 'wpcookbook_text_field_director' );
        $value_director = $setting_director ?: '' ;
        $director = esc_attr( $value_director );

        $setting_mail = get_option( 'wpcookbook_text_field_mail' );
        $value_mail = $setting_mail ?: '' ;
        $mail = esc_attr( $value_mail );

        $setting_host = get_option( 'wpcookbook_text_field_host' );
        $value_host = $setting_host ?: '' ;
        $host = esc_attr( $value_host );

        $setting_hostname = get_option( 'wpcookbook_text_field_hostname' );
        $value_hostname = $setting_hostname ?: '' ;
        $hostname = esc_attr( $value_hostname );

        $setting_host_website = get_option( 'wpcookbook_text_field_host_website' );
        $value_host_website = $setting_host_website ?: '' ;
        $host_website = esc_attr( $value_host_website );

        $setting_host_address = get_option( 'wpcookbook_text_field_host_address' );
        $value_host_address = $setting_host_address ?: '' ;
        $host_address = esc_attr( $value_host_address );

        $setting_host_phone = get_option( 'wpcookbook_text_field_host_phone' );
        $value_host_phone = $setting_host_phone ?: '' ;
        $host_phone = esc_attr( $value_host_phone );

        $setting_host_mail = get_option( 'wpcookbook_text_field_host_mail' );
        $value_host_mail = $setting_host_mail ?: '' ;
        $host_mail = esc_attr( $value_host_mail );

        ?>
            <div style="margin-left: 200px; width:60%">
                <h3>Identité de la société</h3>
                <br>
                <p><?php echo $address;?>. Son capital social est de <?php echo $share_capital;?> €, inscrit sous le numéro de siren n° <?php echo $siren;?></p>
                <p>Numéro de TVA intra-communautaire : <?php echo $tva_ic;?></p>
                <br>
                <h3>Directeur de la publication</h3>
                <br>
                <p><?php echo $director;?></p>
                <p><?php echo $mail;?></p>
                <br>
                <h3>Hébergeur du site</h3>
                <br>
                <p><b>Hébergeur : </b><?php echo $host;?> <b>Société : </b><?php echo $hostname;?> <b>Adresse WEB : </b><?php echo $host_website;?> <b>Adresse postale : </b><?php echo $host_address;?> <b>Téléphone : </b><?php echo $host_phone;?> <b>Adresse WEB : </b><?php echo $host_mail;?> formulaire à suivre sur le site de "<?php echo $hostname;?>"</p>
                <br>
                <h3>Droits d'auteur, textes, photos, liens - COPYRIGHT ©</h3>
                <br>
                <p>Le site <?php echo $website?> est la propriété de la société <?php echo $name ?>. L’ensemble du site relève de la législation française et internationale sur le droit d’auteur et la propriété intellectuelle.</p>
                <p>Toute représentation, utilisation ou reproduction (dans sa forme ou son contenu) du site <?php echo $website?> est strictement interdite sans autorisation écrite préalable de la société <?php echo $name ?>. Elle sera en tout état de cause soumise à l’obligation de faire apparaître la mention claire et lisible de l’adresse du site <?php echo $website?>.</p>
                <p>L’établissement de tout lien hypertexte pointant vers ce site est soumis au même régime. Toutes images, textes et éléments graphiques utilisés sans le consentement de la société <?php echo $name ?> pourra faire l’objet de poursuites légales.</p>
                <br>
                <h3>Avertissement</h3>
                <br>
                <p>Les données mises en ligne sur le site Internet ont pour objectif de présenter la société <?php echo $name ?>. Leur exactitude est périodiquement contrôlée et leur mise à jour assurée régulièrement. Des erreurs ou omissions indépendantes de la volonté de la société <?php echo $name ?> peuvent toutefois se glisser dans les pages de son site.</p>
                <p>En tout état de cause, la responsabilité de la société <?php echo $name ?> ne saurait être retenue en cas de préjudice direct ou indirect (notamment tout préjudice financier, commercial, perte de programme ou de donnée) résultant de l’usage de son site et de l’utilisation des données et informations qui y sont mises en ligne.</p>
                <p>La société <?php echo $name ?> décline également toute responsabilité à l’égard de tout dommage lié à l’utilisation des liens hypertextes mise en ligne sur son site et à la consultation des sites auxquels ils renvoient. Il est expressément rappelé que la société <?php echo $name ?> n’a aucun contrôle ni aucune responsabilité sur le contenu de ces sites. Il incombe donc à chaque internaute de prendre les précautions nécessaires afin de s’assurer que le site sélectionné n’est pas infesté de virus ou autre parasite de nature destructive.</p>
                <br>
            </div>
        <?php

    }
    
    add_action( 'loop_end', 'contenu_post' );
    
}

?>