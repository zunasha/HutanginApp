<?php

$string3 = "
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ".$m."EditPage } from './".$nama_class."_edit.page';

const routes: Routes = [
  {
    path: '',
    component: ".$m."EditPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ".$m."EditPageRoutingModule {}


";


$string3 .= "\n\n\n\n/* End of file  */

/* Created at " . date('Y-m-d H:i:s') . " */
/* Mohammad Irham Akbar CRUD IONIC 6 Angular */";

$hasil_routing_edit = createFile($string3, "../src/app/".$nama_class."_edit/" . $routing_module_edit_file);
