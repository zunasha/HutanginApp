<?php

$string = "<ion-header [translucent]=\"true\">
  <ion-toolbar>
    <ion-buttons slot=\"start\">
      <ion-menu-button></ion-menu-button>
    </ion-buttons>
    <ion-title>Data ".$m."</ion-title>
  </ion-toolbar>
</ion-header>

<ion-content [fullscreen]=\"true\">
  <ion-header collapse=\"condense\">
    <ion-toolbar>
      <ion-title size=\"large\">
        Data ".$m."
      </ion-title>
    </ion-toolbar>
  </ion-header>
  <ion-content>
    <ion-refresher slot=\"fixed\" (ionRefresh)=\"doRefresh(\$event)\">
      <ion-refresher-content pullingIcon=\"chevron-down-circle-outline\" pullingText=\"Tarik Untuk Memuat Data\"
        refreshingSpinner=\"circles\" refreshingText=\"Memuat Ulang Data...\">
      </ion-refresher-content>
    </ion-refresher>
    <hr>
    <ion-card>
      <ion-button color=\"success\" expand=\"block\" [routerLink]=\"['/".$nama_class."_tambah']\">Tambah ".$m."</ion-button>
    </ion-card>
    <hr>
    <ion-card *ngFor=\"let item of lists\">
      <ion-item>
        <ion-label>
         {{item.".$pk."}}";
        
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t\t\t\t\t\t<p>{{item." . $row['column_name'] . "}}</p>";
}
$string .= "
        </ion-label>
        <ion-button color=\"primary\" slot=\"end\" [routerLink]=\"['/".$nama_class."_edit/',item.".$pk."]\"
          routerLinkActive=\"router-link-active\">Edit</ion-button>
        <ion-button color=\"danger\" slot=\"end\" (click)=\"delete".$m."(item.".$pk.")\">Hapus</ion-button>
      </ion-item>
    </ion-card>

    <ion-infinite-scroll (ionInfinite)=\"loadMore(\$event)\">
      <ion-infinite-scroll-content loadingSpinner=\"circles\" loadingText=\"Sedang Memuat Data...\">
      </ion-infinite-scroll-content>
    </ion-infinite-scroll>

  </ion-content>
";


$hasil_view = createFile($string,"../src/app/".$nama_class."/" . $view_file);
