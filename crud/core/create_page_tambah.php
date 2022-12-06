<?php

$string = "
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ApiService } from '../api.service';
@Component({
  selector: 'app-".$nama_class."_tambah',
  templateUrl: './".$nama_class."_tambah.page.html',
  styleUrls: ['./".$nama_class."_tambah.page.scss'],
})
export class ".$m."TambahPage implements OnInit {
  ".$pk.": any;
   ";
        
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t\t\t\t\t\t" . $row['column_name'] . ": any;";
}
$string .= "
  constructor(
    private router: Router,
    public _apiService: ApiService,

  ) { }

  ngOnInit() {
  }

  add".$m."() {
    let data = {";
      foreach ($non_pk as $row) {
          $string .= "\n\t\t\t\t\t\t\t\t" . $row['column_name'] . ": this." . $row['column_name'] . ",";
      }
      $string .= "
    }
    this._apiService.tambah(data, '/tambah".$m.".php')
      .subscribe({
        next: (hasil: any) => {
          console.log(hasil);
          this.".$pk." = '';";
          foreach ($non_pk as $row) {
              $string .= "\n\t\t\t\t\t\t\t\t this." . $row['column_name'] . "='';";
          }
          $string .= "
          this._apiService.notif('berhasil input ".$m."');
          this.router.navigateByUrl('/".$nama_class."');
        },
        error: (err: any) => {
          this._apiService.notif('gagal input ".$m."');
        }
      })
  }

}

";


$string .= "\n\n\n\n/* End of file  */

/* Created at " . date('Y-m-d H:i:s') . " */
/* Mohammad Irham Akbar CRUD IONIC 6 Angular */";

$hasil_page_tambah = createFile($string,"../src/app/".$nama_class."_tambah/" . $page_tambah_file);
