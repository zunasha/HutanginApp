<?php

$string = "
import { Component, OnInit } from '@angular/core';
import { AlertController } from '@ionic/angular';
import { ApiService } from '../api.service';
@Component({
  selector: 'app-".$nama_class."',
  templateUrl: './".$nama_class.".page.html',
  styleUrls: ['./".$nama_class.".page.scss'],
})
export class ".$m."Page {
  page = 0;
  perPage = 10;
  ".$nama_class.": any[] = [];
  lists: any[] = [];
  constructor(
    public _apiService: ApiService,
    private alertController: AlertController,
  ) {

  }

  ngOnInit() {
    console.log('cek fungsi halaman event init jalan');
  }

  ionViewDidEnter() {
    console.log('jika selesai loading');
    this.page = 0;
    this.perPage = 10;
    this.get".$m."();
  }

  paginateArray() {
    this.page++;
    return this.".$nama_class.".filter(
      x => x.urutan_list > (this.page * this.perPage - this.perPage) && x.urutan_list <= (this.page * this.perPage)
    );
  }

  get".$m."() {
    this._apiService.tampil('tampil".$m.".php').subscribe({
      next: (res: any) => {
        console.log('sukses', res);
        this.".$nama_class." = res;
        this.lists = this.paginateArray();
      },
      error: (err:any) => {
        console.log(err);
      },
    })
  }

  doRefresh(event:any) {
    console.log('Mulai Refresh Konten');
    setTimeout(() => {
      console.log('Selesai Refresh Konten');
      event.target.complete();
      this.page = 0;
      this.perPage = 10;
      this.get".$m."();
    }, 2000);
  }

  loadMore(event:any) {
    console.log(event);
    setTimeout(() => {
      const array = this.paginateArray();
      console.log('new data: ', array);
      this.lists = this.lists.concat(array);
      console.log('list data: ', this.lists);
      event.target.complete();
      if (array?.length < this.perPage) {
        event.target.disabled = true;
      };
    }, 1000);
  }

  delete".$m."(id: any) {
    this.alertController.create({
      header: 'perhatian',
      subHeader: 'Yakin menghapus data ini?',
      buttons: [
        {
          text: 'Batal',
          handler: (data: any) => {
            console.log('dibatalkan', data);
          }
        },
        {
          text: 'Yakin',
          handler: (data: any) => {
            //jika tekan yakin
            this._apiService.hapus(id, '/hapus".$m.".php?".$pk."=').subscribe({
              next: (res: any) => {
                console.log('sukses', res);
                this.page = 0;
                this.perPage = 10;
                this.get".$m."();
              },
              error: (error: any) => {
                this._apiService.notif('gagal');
              }
            })
          }
        }
      ]
    }).then(res => {
      res.present();
    })
  }

}
";


$string .= "\n\n\n\n/* End of file  */

/* Created at " . date('Y-m-d H:i:s') . " */
/* Mohammad Irham Akbar CRUD IONIC 6 Angular */";

$hasil_page = createFile($string,"../src/app/".$nama_class."/" . $page_file);
