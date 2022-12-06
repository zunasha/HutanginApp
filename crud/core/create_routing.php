<?php

$string = "
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ".$m."Page } from './".$nama_class.".page';

const routes: Routes = [
  {
    path: '',
    component: ".$m."Page
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ".$m."PageRoutingModule {}


";


$string .= "\n\n\n\n/* End of file  */

/* Created at " . date('Y-m-d H:i:s') . " */
/* Mohammad Irham Akbar CRUD IONIC 6 Angular */";

$hasil_routing = createFile($string,"../src/app/".$nama_class."/" . $routing_module_file);
