<?php
class ExportData {
	public $settings = array(
		'name' => 'Export Data',
		'admin_menu_category' => 'General',
		'admin_menu_name' => 'Export Data',
		'admin_menu_icon' => '<i class="icon-download"></i>',
		'description' => 'Export data from Billic.',
	);
	function admin_area() {
		global $billic, $db;
		$billic->set_title('Admin/Export Data');
		echo '<h1><i class="icon-download"></i> Export Data';
		if (!empty($_GET['Module'])) {
			echo ' &raquo; ' . $_GET['Module'];
		}
		echo '</h1>';
		$billic->show_errors();
		$modules = $billic->module_list_function('exportdata_submodule');
		echo '<div style="width:25%;float:left;">';
		echo '<table class="table table-striped" style="width:98%"><tr><th>Supported Modules</th></tr>';
		if (empty($modules)) {
			echo '<tr><td colspan="20">There are no modules which support exporting data.</td></tr>';
		}
		foreach ($modules as $module) {
			echo '<tr><td><a href="/Admin/ExportData/Module/' . $module['id'] . '/">' . $module['id'] . '</a></td></tr>';
		}
		echo '</table>';
		echo '</div>';
		echo '<div style="width:75%;float:left;">';
		if (isset($_GET['Module'])) {
			$billic->module($_GET['Module']);
			$billic->modules[$_GET['Module']]->exportdata_submodule();
		}
		echo '</div>';
		echo '<div style="clear:both"></div>';
	}
}
