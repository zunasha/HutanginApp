<?php

$string = "
import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { ".$m."TambahPage } from './".$nama_class."_tambah.page';

describe('".$m."TambahPage', () => {
  let component: ".$m."TambahPage;
  let fixture: ComponentFixture<".$m."TambahPage>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ ".$m."TambahPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(".$m."TambahPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});

";


$string .= "\n\n\n\n/* End of file  */

/* Created at " . date('Y-m-d H:i:s') . " */
/* Mohammad Irham Akbar CRUD IONIC 6 Angular */";

$hasil_spec_tambah = createFile($string,"../src/app/".$nama_class."_tambah/" . $spec_tambah_file);
