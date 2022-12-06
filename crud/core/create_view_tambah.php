<?php

$string = "<ion-header [translucent]=\"true\">
  <ion-toolbar>
    <ion-buttons slot=\"start\">
      <ion-menu-button></ion-menu-button>
    </ion-buttons>
    <ion-title>Tambah ".$m."</ion-title>
  </ion-toolbar>

</ion-header>

<ion-content [fullscreen]=\"true\">
  <ion-header collapse=\"condense\">
    <ion-toolbar>
      <ion-title size=\"large\">
        Tambah Mahasiswa
      </ion-title>
    </ion-toolbar>
  </ion-header>
  <ion-list lines=\"full\">";
        
foreach ($non_pk as $row) {
    $string .= "\n\t\t\t\t\t\t\t\t
    <ion-item>
      <ion-label position=\"floating\">" . label($row['column_name']) . "</ion-label>
      <ion-input required [(ngModel)]=\"" . $row['column_name'] . "\" placeholder=\"Masukkan " . label($row['column_name']) . "\" type=\"text\">
      </ion-input>
    </ion-item>";
}
$string .= "
    <ion-row>
      <ion-col>
        <ion-button type=\"button\" (click)=\"add".$m."()\" color=\"primary\" shape=\"full\" expand=\"block\">Tambah ".$m."
        </ion-button>
      </ion-col>
    </ion-row>
  </ion-list>
</ion-content>";
        

$hasil_view_tambah = createFile($string,"../src/app/".$nama_class."_tambah/" . $view_tambah_file);
