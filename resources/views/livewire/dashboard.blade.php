<div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ $title ?? "Page" }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content" style="margin-left: -100px">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card" style="max-width: 700px">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Users by Country</h3>
                  <a href="javascript:void(0);"></a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">{{ $total_users }}</span>
                    <span>Total Users</span>
                  </p>
                  <!-- <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Since last week</span>
                  </p> -->
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                    <div>
                        <!-- <form wire:submit="filter_country">
                            <label for="selected_country">Select Country:</label>
                            <select wire:model="country_id" name="country_id" id="selected_country" class="form-control">
                                <option value="" selected>All</option>
                                
                            </select>

                            <button type="submit" class="btn btn-primary" style="float:right; margin-top: 20px;">Apply Filters</button>
                        </form> -->
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                    
                </div>

                <!-- <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This Week
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last Week
                  </span>
                </div> -->
              </div>
            </div>
            <!-- /.card -->

            
            <!-- /.card -->
          </div>
         <div class="col-lg-6">
        <div class="card">
            <div class="card-header border-0">
                <h3 class="card-title">Users</h3>
                <div class="card-tools">
                
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Skills</th>
                    <th>Country</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)

                        <tr wire:key="{{ $user->id }}">
                            <td>
                            
                            {{ $user->name }}
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                {{ $user->skills}}
                            </td>
                            <td>
                                {{ $user->country->name}}
                            </td>
                        </tr>

                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>

        


        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

    
        <script>

            var chart = {!! json_encode($chartData->toArray()) !!};

            console.log(chart);

            const names = chart.map(country => country.name);
            const userCounts = chart.map(country => country.user_count);    

            console.log(names);       // ["France", "United States", "Portugal", "United Kingdom", "Brazil"]
            console.log(userCounts);  // [6, 5, 5, 2, 2]

            

            // Example data
            var data = {
                labels: names,
                datasets: [{
                    label: '',
                    data: userCounts,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            };

            var options = {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            };

            // Create the chart
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: data,
                options: options
            });
        </script>
   
