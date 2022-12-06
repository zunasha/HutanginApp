<?php

$string = "import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ".$m."EditPageRoutingModule } from './".$nama_class."_edit-routing.module';

import { ".$m."EditPage } from './".$nama_class."_edit.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ".$m."EditPageRoutingModule
  ],
  declarations: [".$m."EditPage]
})
export class ".$m."EditPageModule {}
";


$string .= "\n\n\n\n/* End of file  */

/* Created at " . date('Y-m-d H:i:s') . " */
/* Mohammad Irham Akbar CRUD IONIC 6 Angular */";

$hasil_module_edit = createFile($string,"../src/app/".$nama_class."_edit/" . $module_edit_file);
