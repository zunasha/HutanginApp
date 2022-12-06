
import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { ListhutangTambahPage } from './listhutang_tambah.page';

describe('ListhutangTambahPage', () => {
  let component: ListhutangTambahPage;
  let fixture: ComponentFixture<ListhutangTambahPage>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ ListhutangTambahPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(ListhutangTambahPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});





/* End of file  */

/* Created at 2022-12-06 15:16:59 */
/* Mohammad Irham Akbar CRUD IONIC 6 Angular */