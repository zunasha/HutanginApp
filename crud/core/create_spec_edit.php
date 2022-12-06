<?php

$string = "
import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { ".$m."EditPage } from './".$nama_class."_edit.page';

describe('".$m."EditPage', () => {
  let component: ".$m."EditPage;
  let fixture: ComponentFixture<".$m."EditPage>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ ".$m."EditPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(".$m."EditPage);
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

$hasil_spec_edit = createFile($string,"../src/app/".$nama_class."_edit/" . $spec_edit_file);
