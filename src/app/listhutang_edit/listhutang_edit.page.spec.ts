
import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { ListhutangEditPage } from './listhutang_edit.page';

describe('ListhutangEditPage', () => {
  let component: ListhutangEditPage;
  let fixture: ComponentFixture<ListhutangEditPage>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ ListhutangEditPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(ListhutangEditPage);
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