<?php

$string = "
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ApiService } from '../api.service';
@Component({
  selector: 'app-".$nama_class."_edit',
  templateUrl: './".$nama_class."_edit.page.html',
  styleUrls: ['./".$nama_class."_edit.page.scss'],
})
export class ".$m."EditPage implements OnInit {
   ".$pk.": any;";
        
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t\t\t\t\t\t" . $row['column_name'] . ": any;";
}
$string .= "

  constructor(
    private route: ActivatedRoute,
    private router: Router,
    public _apiService: ApiService,
  ) {
    this.route.params.subscribe((param: any) => {
      this.".$pk." = param.id;
      console.log(this.".$pk.");
      this.ambil".$m."(this.".$pk.");
    })
  }

  ngOnInit() {
  }

  ambil".$m."(id: any) {
    this._apiService.lihat(id, '/lihat".$m.".php?".$pk."=').subscribe({
      next: (hasil: any) => {
        console.log('sukses', hasil);
        let ".$nama_class." = hasil; ";
        
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t\t\t\t\t\t this." . $row['column_name'] . "= ".$nama_class."." . $row['column_name'] . ";";
}
$string .= "
      },
      error: (error: any) => {
        this._apiService.notif('gagal ambil data');
      }
    })
  }

  edit".$m."() {
    let data = {
      ".$pk.": this.".$pk.",";
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t\t\t\t\t\t " . $row['column_name'] . ":this." . $row['column_name'] . ",";
}
$string .= "
    }
    this._apiService.edit(data, '/edit".$m.".php')
      .subscribe({
        next: (hasil: any) => {
          console.log(hasil);
          this.".$pk." = '';";
          foreach ($non_pk as $row) {
              $string .= "\n\t\t\t\t\t\t\t\t this." . $row['column_name'] . "='';";
          }
          $string .= "
          this._apiService.notif('berhasil edit ".$m."');
          this.router.navigateByUrl('/".$nama_class."');
        },
        error: (err: any) => {
          this._apiService.notif('gagal edit ".$m."');
        }
      })
  }

 

}
";


$string .= "\n\n\n\n/* End of file  */

/* Created at " . date('Y-m-d H:i:s') . " */
/* Mohammad Irham Akbar CRUD IONIC 6 Angular */";

$hasil_page_edit = createFile($string,"../src/app/".$nama_class."_edit/" . $page_edit_file);
