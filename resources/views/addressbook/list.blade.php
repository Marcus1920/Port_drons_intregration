

<!-- Modal Default -->
<div class="modal fade modalAddressBook" id="modalAddressBook" style="background-color: white;" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id ="closeListContactModal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id='depTitle'>Address Book</h4>
            </div>
            <div class="row">
              <div class="col-md-6">

              </div>
               <div class="col-md-6">
                 <a class="btn btn-sm" data-toggle="modal" onClick="launchAddContactModal();" data-target=".modalAddContactModal">Add Contact</a>
              </div>
            </div>
            <div class="modal-body">
                <!-- Responsive Table -->
                <div class="block-area" id="responsiveTable">
                    @if(Session::has('successAddressBook'))
                    <div class="alert alert-success alert-icon">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('successAddressBook') }}
                        <i class="icon">&#61845;</i>
                    </div>
                    @endif
                    <div class="table-responsive overflow">
                        <table class="table tile table-striped" id="addressBookTable">
                            <thead>
                              <tr>
                                    <th>Created At</th>
                                    <th>First Name</th>
                                    <th>Surname</th>
                                    <th>Cellphone</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                              </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal-footer">

            </div>


        </div>
    </div>
</div>

