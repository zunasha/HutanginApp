
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ApiService } from '../api.service';
@Component({
  selector: 'app-listhutang_edit',
  templateUrl: './listhutang_edit.page.html',
  styleUrls: ['./listhutang_edit.page.scss'],
})
export class ListhutangEditPage implements OnInit {
   id: any;
								nama_penghutang: any;
								tanggal_hutang: any;
								batas_tanggal_hutang: any;
								jumlah_hutang: any;

  constructor(
    private route: ActivatedRoute,
    private router: Router,
    public _apiService: ApiService,
  ) {
    this.route.params.subscribe((param: any) => {
      this.id = param.id;
      console.log(this.id);
      this.ambilListhutang(this.id);
    })
  }

  ngOnInit() {
  }

  ambilListhutang(id: any) {
    this._apiService.lihat(id, '/lihatListhutang.php?id=').subscribe({
      next: (hasil: any) => {
        console.log('sukses', hasil);
        let listhutang = hasil; 
								 this.nama_penghutang= listhutang.nama_penghutang;
								 this.tanggal_hutang= listhutang.tanggal_hutang;
								 this.batas_tanggal_hutang= listhutang.batas_tanggal_hutang;
								 this.jumlah_hutang= listhutang.jumlah_hutang;
      },
      error: (error: any) => {
        this._apiService.notif('gagal ambil data');
      }
    })
  }

  editListhutang() {
    let data = {
      id: this.id,
								 nama_penghutang:this.nama_penghutang,
								 tanggal_hutang:this.tanggal_hutang,
								 batas_tanggal_hutang:this.batas_tanggal_hutang,
								 jumlah_hutang:this.jumlah_hutang,
    }
    this._apiService.edit(data, '/editListhutang.php')
      .subscribe({
        next: (hasil: any) => {
          console.log(hasil);
          this.id = '';
								 this.nama_penghutang='';
								 this.tanggal_hutang='';
								 this.batas_tanggal_hutang='';
								 this.jumlah_hutang='';
          this._apiService.notif('berhasil edit Listhutang');
          this.router.navigateByUrl('/listhutang');
        },
        error: (err: any) => {
          this._apiService.notif('gagal edit Listhutang');
        }
      })
  }

 

}




/* End of file  */

/* Created at 2022-12-06 15:16:59 */
/* Mohammad Irham Akbar CRUD IONIC 6 Angular */