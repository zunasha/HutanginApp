<?php

$string = "import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ".$m."TambahPageRoutingModule } from './".$nama_class."_tambah-routing.module';

import { ".$m."TambahPage } from './".$nama_class."_tambah.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ".$m."TambahPageRoutingModule
  ],
  declarations: [".$m."TambahPage]
})
export class ".$m."TambahPageModule {}
";


$string .= "\n\n\n\n/* End of file  */

/* Created at " . date('Y-m-d H:i:s') . " */
/* Mohammad Irham Akbar CRUD IONIC 6 Angular */";

$hasil_module_tambah = createFile($string,"../src/app/".$nama_class."_tambah/" . $module_tambah_file);
