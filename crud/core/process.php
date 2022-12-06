<?php

$hasil = array();

if (isset($_POST['generate'])) {
    $konfigurasi_database =  $PembuatKode->konfigurasi();
    $nama_api = $PembuatKode->nama_api();
    // get form data
    $table_name = safe($_POST['table_name']);
    $controller = safe($_POST['controller']);
    $model = safe($_POST['model']);
    $form = safe($_POST['form']);
    $list = safe($_POST['list']);
    $show = safe($_POST['show']);

    if ($table_name <> '') {
        // set data
        $table_name = $table_name;
        $c = $controller <> '' ? ucfirst($controller) : ucfirst($table_name) . '';
        $m = $model <> '' ? ucfirst($model) : ucfirst($table_name);
        $v_list = $list <> '' ? $list : $table_name . "_index.blade";
        $v_show = $show <> '' ? $show : $table_name . "_show.blade";
        $v_form = $form <> '' ? $form : $table_name . "_create.blade";

        // url
        $c_url = strtolower($c);
        $nama_class = strtolower($m);
        // api php di backend
        $api_koneksi = 'koneksi.php';
        $api_tambah = 'tambah'.$m.".php";
        $api_lihat = 'lihat'.$m.".php";
        $api_edit = 'edit'.$m.".php";
        $api_hapus = 'hapus'.$m.".php";
        $api_tampil = 'tampil'.$m.".php";
        // nama file api di frontend
        $api_file = 'api.service.ts';
        $api_spec_file = 'api.service.spec.ts';
        // nama file routing
        $routing_module_file = $table_name . '-routing.module.ts';
        $routing_module_tambah_file = $table_name . '_tambah-routing.module.ts';
        $routing_module_edit_file = $table_name . '_edit-routing.module.ts';
        // nama file module
        $module_file = $table_name . '.module.ts';
        $module_tambah_file = $table_name . '_tambah.module.ts';
        $module_edit_file = $table_name . '_edit.module.ts';
        // nama file view html
        $view_file = $table_name . '.page.html';
        $view_tambah_file = $table_name . '_tambah.page.html';
        $view_edit_file = $table_name . '_edit.page.html';
        // nama file scss
        $css_file = $table_name . '.page.scss';
        $css_tambah_file = $table_name . '_tambah.page.scss';
        $css_edit_file = $table_name . '_edit.page.scss';
        // nama file spec
        $spec_file = $table_name . '.page.spec.ts';
        $spec_tambah_file = $table_name . '_tambah.page.spec.ts';
        $spec_edit_file = $table_name . '_edit.page.spec.ts';
        // nama file page
        $page_file = $table_name . '.page.ts';
        $page_tambah_file = $table_name . '_tambah.page.ts';
        $page_edit_file = $table_name . '_edit.page.ts';
        $root_folder=$_SERVER["DOCUMENT_ROOT"];
        
        if (!file_exists("../../../".$nama_api)) {
           // echo "buat api di localhost";
            mkdir("../../../".$nama_api, 0777, true);
        }
        if (!file_exists("../src/app/" . $nama_class)) {
            mkdir("../src/app/" . $nama_class, 0777, true);
            mkdir("../src/app/" . $nama_class . '_tambah', 0777, true);
            mkdir("../src/app/" . $nama_class . '_edit', 0777, true);
            //tambah menu side
            $tambahmenu = "{ title: '" . $m . "', url: '/" . $nama_class . "', icon: 'cube' },";
            $filename_menu = getcwd() . "/../src/app/app.component.ts";
            $linesmenu = file($filename_menu, FILE_IGNORE_NEW_LINES);
            $jmlbarismenu = 1;
            foreach ($linesmenu as $valuesmenu) {
                if (trim(substr($valuesmenu, -2)) == '},') {
                    break;
                }
                $jmlbarismenu++;
            }
            array_splice($linesmenu, $jmlbarismenu, 0, $tambahmenu);
            file_put_contents($filename_menu, implode(PHP_EOL, $linesmenu));
            //tambah route
            $tambahroute = "{
                path: '" . $nama_class . "',
                loadChildren: () => import('./" . $nama_class . "/" . $nama_class . ".module').then( m => m." . $m . "PageModule)
              },
              {
                path: '" . $nama_class . "_tambah',
                loadChildren: () => import('./" . $nama_class . "_tambah/" . $nama_class . "_tambah.module').then( m => m." . $m . "TambahPageModule)
              },
              {
                path: '" . $nama_class . "_edit/:id',
                loadChildren: () => import('./" . $nama_class . "_edit/" . $nama_class . "_edit.module').then( m => m." . $m . "EditPageModule)
              },";
            $filename_route = getcwd() . "/../src/app/app-routing.module.ts";
            $lines = file($filename_route, FILE_IGNORE_NEW_LINES);
            $jmlbaris = 1;
            foreach ($lines as $valuesroute) {
                if (trim($valuesroute) == '},') {
                    break;
                }
                $jmlbaris++;
            }
            array_splice($lines, $jmlbaris, 0, $tambahroute);
            file_put_contents($filename_route, implode(PHP_EOL, $lines));
        }



        $pk = $PembuatKode->primary_field($table_name);
        $non_pk = $PembuatKode->not_primary_field($table_name);
        $all = $PembuatKode->all_field($table_name);
        //generate api backend php
        include 'core/create_backend_api_koneksi.php';
        include 'core/create_backend_api_tampil.php';
        include 'core/create_backend_api_tambah.php';
        include 'core/create_backend_api_hapus.php';
        include 'core/create_backend_api_lihat.php';
        include 'core/create_backend_api_edit.php';
        //generate app_module.ts
        include 'core/create_app_module.php';
        //generate api service
        include 'core/create_api_service.php';
        include 'core/create_api_service_spec.php';
        // generate routing
        include 'core/create_routing.php';
        include 'core/create_routing_tambah.php';
        include 'core/create_routing_edit.php';
        //generate module
        include 'core/create_module.php';
        include 'core/create_module_tambah.php';
        include 'core/create_module_edit.php';
        //generate view
        include 'core/create_view.php';
        include 'core/create_view_tambah.php';
        include 'core/create_view_edit.php';
        //generate scss
        include 'core/create_css.php';
        include 'core/create_css_tambah.php';
        include 'core/create_css_edit.php';
        //generate spec
        include 'core/create_spec.php';
        include 'core/create_spec_tambah.php';
        include 'core/create_spec_edit.php';
        //generate page ts
        include 'core/create_page.php';
        include 'core/create_page_tambah.php';
        include 'core/create_page_edit.php';

        $hasil[] = $hasil_koneksi;
        $hasil[] = $hasil_backend_tampil;
        $hasil[] = $hasil_backend_tambah;
        $hasil[] = $hasil_backend_hapus;
        $hasil[] = $hasil_backend_lihat;
        $hasil[] = $hasil_backend_edit;

        $hasil[] = $hasil_app_module;
        $hasil[] = $hasil_api;
        $hasil[] = $hasil_api_spec;

        $hasil[] = $hasil_routing;
        $hasil[] = $hasil_routing_tambah;
        $hasil[] = $hasil_routing_edit;

        $hasil[] = $hasil_module;
        $hasil[] = $hasil_module_tambah;
        $hasil[] = $hasil_module_edit;

        $hasil[] = $hasil_view;
        $hasil[] = $hasil_view_tambah;
        $hasil[] = $hasil_view_edit;

        $hasil[] = $hasil_css;
        $hasil[] = $hasil_css_tambah;
        $hasil[] = $hasil_css_edit;

        $hasil[] = $hasil_spec;
        $hasil[] = $hasil_spec_tambah;
        $hasil[] = $hasil_spec_edit;

        $hasil[] = $hasil_page;
        $hasil[] = $hasil_page_tambah;
        $hasil[] = $hasil_page_edit;
    } else {
        $hasil[] = 'No table selected.';
    }
}

// if (isset($_POST['generateall'])) {

//     $jenis_tabel = safe($_POST['jenis_tabel']);
//     $export_excel = safe($_POST['export_excel']);
//     $export_word = safe($_POST['export_word']);
//     $export_pdf = safe($_POST['export_pdf']);

//     $table_list = $PembuatKode->table_list();
//     foreach ($table_list as $row) {

//         $table_name = $row['table_name'];
//         $c = ucfirst($table_name);
//         $m = ucfirst($table_name) . '_model';
//         $v_list = $table_name . "_list";
//         $v_show = $table_name . "_show";
//         $v_form = $table_name . "_form";
//         $v_doc = $table_name . "_doc";
//         $v_pdf = $table_name . "_pdf";

//         // url
//         $c_url = strtolower($c);

//         // filename_route
//         $c_file = $c . '.php';
//         $m_file = $m . '.php';
//         $v_list_file = $v_list . '.php';
//         $v_show_file = $v_show . '.php';
//         $v_form_file = $v_form . '.php';
//         $v_doc_file = $v_doc . '.php';
//         $v_pdf_file = $v_pdf . '.php';

//         // show setting
//         $get_setting = readJSON('core/settingjson.cfg');
//         $target = $get_setting->target;
//         if (!file_exists($target . "views/" . $c_url)) {
//             mkdir($target . "views/" . $c_url, 0777, true);
//         }

//         $pk = $PembuatKode->primary_field($table_name);
//         $non_pk = $PembuatKode->not_primary_field($table_name);
//         $all = $PembuatKode->all_field($table_name);

//         // generate
//         //include 'core/create_config_pagination.php';
//         include 'core/create_controller.php';
//         include 'core/create_model.php';
//         if ($jenis_tabel == 'reguler_table') {
//             include 'core/create_view_list.php';
//         } else if ($jenis_tabel == 'datatables') {
//             include 'core/create_view_list_datatables.php';
//             include 'core/create_libraries_datatables.php';
//         } else if ($jenis_tabel == 'clientside') {
//             include 'core/create_view_list_clientside.php';
//         }
//         include 'core/create_view_form.php';
//         include 'core/create_view_show.php';

//         $export_excel == 1 ? include 'core/create_exportexcel_helper.php' : '';
//         $export_word == 1 ? include 'core/create_view_list_doc.php' : '';
//         $export_pdf == 1 ? include 'core/create_pdf_library.php' : '';
//         $export_pdf == 1 ? include 'core/create_view_list_pdf.php' : '';

//         $hasil[] = $hasil_controller;
//         $hasil[] = $hasil_model;
//         $hasil[] = $hasil_view_list;
//         $hasil[] = $hasil_view_form;
//         $hasil[] = $hasil_view_show;
//         $hasil[] = $hasil_view_doc;
//     }

//     //$hasil[] = $hasil_config_pagination;
//     $hasil[] = $hasil_exportexcel;
//     $hasil[] = $hasil_pdf;
// }
