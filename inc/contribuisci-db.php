<?php
global $icc_contribuisci_db_version;
$icc_contribuisci_db_version = '1.1';


function icc_contribuisci_db_init(){
  global $wpdb;
  global $icc_contribuisci_db_version;

  $table_name = $wpdb->prefix.'icc_contribuisci';
  $installed_ver = get_option( "icc_contribuisci_db_version" );

  if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name || $installed_ver != $icc_contribuisci_db_version) {
       //table not in database. Create new table
       $charset_collate = $wpdb->get_charset_collate();

       $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            fullname text NOT NULL,
            fullsurname text NOT NULL,
            email text NOT NULL,
            telephone text NOT NULL,
            indirizzo text NOT NULL,
            citta text NOT NULL,
            provincia text NOT NULL,
            cap text NOT NULL,
            amount text NOT NULL,
            frequenza text NOT NULL,
            UNIQUE KEY id (id)
       ) $charset_collate;";
       require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
       dbDelta( $sql );
  }
  if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name){
      add_option( 'icc_contribuisci_db_version', $icc_contribuisci_db_version );
  } else {
    update_option('icc_contribuisci_db_version', $icc_contribuisci_db_version );
  }
}
add_action( 'init', 'icc_contribuisci_db_init' );

function icc_contribuisci_db_add_data($fullname,$fullsurname,$email,$telephone,$indirizzo,$citta,$provincia,$cap,$amount,$frequenza){
  global $wpdb;
  $table_name = $wpdb->prefix.'icc_contribuisci';
  $wpdb->insert(
		$table_name,
		array(
			'time' => current_time( 'mysql' ),
			'fullname' => $fullname,
			'fullsurname' => $fullsurname,
      'email' => $email,
      'telephone' => $telephone,
      'indirizzo' => $indirizzo,
      'citta' => $citta,
      'provincia' => $provincia,
      'cap' => $cap,
      'amount' => $amount,
      'frequenza' => $frequenza,
		)
	);
}


add_action( 'admin_menu', 'icc_contribuisci_admin' );
function icc_contribuisci_admin(){
  add_menu_page(
      'Contribuisci',     // page title
      'Contribuisci',     // menu title
      'edit_posts',   // capability
      'contribuisci',     // menu slug
      'icc_contribuisci_admin_view' // callback function
  );
}

function icc_contribuisci_admin_view(){
  require 'contribuisci-db-view.php';
}


if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

class Custom_Table_Example_List_Table extends WP_List_Table
{
    /**
        * [REQUIRED] You must declare constructor and give some basic params
        */
    function __construct()
    {
        global $status, $page;

        parent::__construct(array(
            'singular' => 'contributire',
            'plural' => 'contributori',
        ));
    }

    /**
        * [REQUIRED] this is a default column renderer
        *
        * @param $item - row (key, value array)
        * @param $column_name - string (key)
        * @return HTML
        */
    function column_default($item, $column_name)
    {
        return $item[$column_name];
    }

    /**
        * [OPTIONAL] this is example, how to render specific column
        *
        * method name must be like this: "column_[column_name]"
        *
        * @param $item - row (key, value array)
        * @return HTML
        */
    function column_age($item)
    {
        return '<em>' . $item['age'] . '</em>';
    }

    /**
        * [OPTIONAL] this is example, how to render column with actions,
        * when you hover row "Edit | Delete" links showed
        *
        * @param $item - row (key, value array)
        * @return HTML
        */
    function column_name($item)
    {
        // links going to /admin.php?page=[your_plugin_page][&other_params]
        // notice how we used $_REQUEST['page'], so action will be done on curren page
        // also notice how we use $this->_args['singular'] so in this example it will
        // be something like &person=2
        $actions = array(
            'edit' => sprintf('<a href="?page=persons_form&id=%s">%s</a>', $item['id'], __('Edit', 'custom_table_example')),
            'delete' => sprintf('<a href="?page=%s&action=delete&id=%s">%s</a>', $_REQUEST['page'], $item['id'], __('Delete', 'custom_table_example')),
        );

        return sprintf('%s %s',
            $item['name'],
            $this->row_actions($actions)
        );
    }

    /**
        * [REQUIRED] this is how checkbox column renders
        *
        * @param $item - row (key, value array)
        * @return HTML
        */
    function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="id[]" value="%s" />',
            $item['id']
        );
    }

    /**
        * [REQUIRED] This method return columns to display in table
        * you can skip columns that you do not want to show
        * like content, or description
        *
        * @return array
        */
    function get_columns()
    {
        $columns = array(
            'cb' => '<input type="checkbox" />', //Render a checkbox instead of text
            'fullname' => __('Nome', 'icc'),
            'fullsurname' => __('Cognome', 'icc'),
            'email' => __('eMail', 'icc'),
            'telephone' => __('Telefono', 'icc'),
            'indirizzo' => __('Indirizzo', 'icc'),
            'citta' => __('Citta', 'icc'),
            'provincia' => __('Provincia', 'icc'),
            'cap' => __('CAP', 'icc'),
            'amount' => __('Cifra', 'icc'),
            'frequenza' => __('Frequenza', 'icc'),
            'time' => __('Data', 'icc'),
        );
        return $columns;
    }

    /**
        * [OPTIONAL] This method return columns that may be used to sort table
        * all strings in array - is column names
        * notice that true on name column means that its default sort
        *
        * @return array
        */
    function get_sortable_columns()
    {
        $sortable_columns = array(
            'fullname' => array('fullname', true),
            'fullsurname' => array('fullsurname', false),
            'email' => array('email', false),
            'time' => array('time', false),
        );
        return $sortable_columns;
    }

    /**
        * [OPTIONAL] Return array of bult actions if has any
        *
        * @return array
        */
    function get_bulk_actions()
    {
        $actions = array(
            'delete' => 'Delete'
        );
        return $actions;
    }

    /**
        * [OPTIONAL] This method processes bulk actions
        * it can be outside of class
        * it can not use wp_redirect coz there is output already
        * in this example we are processing delete action
        * message about successful deletion will be shown on page in next part
        */
    function process_bulk_action()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'icc_contribuisci'; // do not forget about tables prefix

        if ('delete' === $this->current_action()) {
            $ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();
            if (is_array($ids)) $ids = implode(',', $ids);

            if (!empty($ids)) {
                $wpdb->query("DELETE FROM $table_name WHERE id IN($ids)");
            }
        }
    }

    /**
        * [REQUIRED] This is the most important method
        *
        * It will get rows from database and prepare them to be showed in table
        */
    function prepare_items()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'icc_contribuisci'; // do not forget about tables prefix

        $per_page = 50; // constant, how much records will be shown per page

        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();

        // here we configure table headers, defined in our methods
        $this->_column_headers = array($columns, $hidden, $sortable);

        // [OPTIONAL] process bulk action if any
        $this->process_bulk_action();

        // will be used in pagination settings
        $total_items = $wpdb->get_var("SELECT COUNT(id) FROM $table_name");

        // prepare query params, as usual current page, order by and order direction
        $paged = isset($_REQUEST['paged']) ? ($per_page * max(0, intval($_REQUEST['paged']) - 1)) : 0;
        $orderby = (isset($_REQUEST['orderby']) && in_array($_REQUEST['orderby'], array_keys($this->get_sortable_columns()))) ? $_REQUEST['orderby'] : 'time';
        $order = (isset($_REQUEST['order']) && in_array($_REQUEST['order'], array('asc', 'desc'))) ? $_REQUEST['order'] : 'desc';

        // [REQUIRED] define $items array
        // notice that last argument is ARRAY_A, so we will retrieve array
        $this->items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name ORDER BY $orderby $order LIMIT %d OFFSET %d", $per_page, $paged), ARRAY_A);

        // [REQUIRED] configure pagination
        $this->set_pagination_args(array(
            'total_items' => $total_items, // total items defined above
            'per_page' => $per_page, // per page constant defined at top of method
            'total_pages' => ceil($total_items / $per_page) // calculate pages count
        ));
    }
}

?>
