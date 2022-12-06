<?php

$string2 = "
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ".$m."TambahPage } from './".$nama_class."_tambah.page';

const routes: Routes = [
  {
    path: '',
    component: ".$m."TambahPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ".$m."TambahPageRoutingModule {}


";


$string2 .= "\n\n\n\n/* End of file  */

/* Created at " . date('Y-m-d H:i:s') . " */
/* Mohammad Irham Akbar CRUD IONIC 6 Angular */";

$hasil_routing_tambah = createFile($string2,"../src/app/".$nama_class."_tambah/" . $routing_module_tambah_file);
