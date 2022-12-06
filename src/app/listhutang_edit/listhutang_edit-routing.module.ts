
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { ListhutangEditPage } from './listhutang_edit.page';

const routes: Routes = [
  {
    path: '',
    component: ListhutangEditPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class ListhutangEditPageRoutingModule {}






/* End of file  */

/* Created at 2022-12-06 15:16:59 */
/* Mohammad Irham Akbar CRUD IONIC 6 Angular */