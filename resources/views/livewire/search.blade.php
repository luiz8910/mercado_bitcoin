<div class="content-wrapper" style="margin-left: -50px">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form>
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                        
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Sort Order:</label>
                                    <select wire:model="sortOrder" class="form-control" style="width: 100%;">
                                        <option selected>ASC</option>
                                        <option>DESC</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Order By:</label>
                                    <select wire:model="orderBy" class="form-control" style="width: 100%;">
                                        <option selected>Name</option>
                                        <option value="country_id">Country</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="search" wire:model.live="search" class="form-control form-control-lg" placeholder="Search for users...">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>
            </form>
            <div class="row mt-3">
                <div class="col-md-10 offset-md-1">
                    
                    <div class="list-group">
                        @foreach($users as $user)
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col px-4">
                                        <div>
                                            <div class="float-right">{{ $user->created_at }}</div>
                                            <h3>Name: {{ $user->name }}</h3>
                                            <h4>Country: {{ $user->country->name ?? "Not provided"}}</h4>
                                            <p class="mb-0">Education: {{ $user->education ?? "Not provided" }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
  </div>