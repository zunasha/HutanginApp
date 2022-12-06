<?php

$string = "<ion-header [translucent]=\"true\">
  <ion-toolbar>
    <ion-buttons slot=\"start\">
      <ion-menu-button></ion-menu-button>
    </ion-buttons>
    <ion-title>Edit ".$m."</ion-title>
  </ion-toolbar>

</ion-header>

<ion-content [fullscreen]=\"true\">
  <ion-header collapse=\"condense\">
    <ion-toolbar>
      <ion-title size=\"large\">
        Edit Mahasiswa
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
      <ion-input required [(ngModel)]=\"" . $pk . "\" type=\"hidden\">
      </ion-input>
    <ion-row>
      <ion-col>
        <ion-button type=\"button\" (click)=\"edit".$m."()\" color=\"primary\" shape=\"full\" expand=\"block\">Edit ".$m."
        </ion-button>
      </ion-col>
    </ion-row>
  </ion-list>
</ion-content>";
        

$hasil_view_edit = createFile($string,"../src/app/".$nama_class."_edit/" . $view_edit_file);
