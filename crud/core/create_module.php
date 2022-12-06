<?php

$string = "import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { ".$m."PageRoutingModule } from './".$nama_class."-routing.module';

import { ".$m."Page } from './".$nama_class.".page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    ".$m."PageRoutingModule
  ],
  declarations: [".$m."Page]
})
export class ".$m."PageModule {}
";


$string .= "\n\n\n\n/* End of file  */

/* Created at " . date('Y-m-d H:i:s') . " */
/* Mohammad Irham Akbar CRUD IONIC 6 Angular */";

$hasil_module = createFile($string,"../src/app/".$nama_class."/" . $module_file);
