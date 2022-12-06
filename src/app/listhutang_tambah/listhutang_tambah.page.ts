
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ApiService } from '../api.service';
@Component({
  selector: 'app-listhutang_tambah',
  templateUrl: './listhutang_tambah.page.html',
  styleUrls: ['./listhutang_tambah.page.scss'],
})
export class ListhutangTambahPage implements OnInit {
  id: any;
   
								nama_penghutang: any;
								tanggal_hutang: any;
								batas_tanggal_hutang: any;
								jumlah_hutang: any;
  constructor(
    private router: Router,
    public _apiService: ApiService,

  ) { }

  ngOnInit() {
  }

  addListhutang() {
    let data = {
								nama_penghutang: this.nama_penghutang,
								tanggal_hutang: this.tanggal_hutang,
								batas_tanggal_hutang: this.batas_tanggal_hutang,
								jumlah_hutang: this.jumlah_hutang,
    }
    this._apiService.tambah(data, '/tambahListhutang.php')
      .subscribe({
        next: (hasil: any) => {
          console.log(hasil);
          this.id = '';
								 this.nama_penghutang='';
								 this.tanggal_hutang='';
								 this.batas_tanggal_hutang='';
								 this.jumlah_hutang='';
          this._apiService.notif('berhasil input Listhutang');
          this.router.navigateByUrl('/listhutang');
        },
        error: (err: any) => {
          this._apiService.notif('gagal input Listhutang');
        }
      })
  }

}





/* End of file  */

/* Created at 2022-12-06 15:16:59 */
/* Mohammad Irham Akbar CRUD IONIC 6 Angular */