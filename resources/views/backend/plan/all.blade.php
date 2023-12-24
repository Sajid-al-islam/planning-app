<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Bangla:ital@0;1&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        * {
            font-family: 'Tiro Bangla', serif;
        }

        .dawat_color {
            color: #033092;
        }

        @media print {
            body {
                visibility: hidden;
            }

            #print_section {
                visibility: visible;
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>
    <title>Department plans</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <section class="my-5">
                    <h3 class="text-center">Department plans</h3>
                </section>
                <div class="d-flex justify-content-end">
                    <button role="button" type="button" onclick="window.print()" class="btn btn-success">
                        print
                    </button>
                </div>

                <div class="dept_sections" id="print_section">
                    @foreach ($dofas as $dofa)
                        <div class="dofa">
                            <div class="dofa-heading mb-3">
                                <h4 class="text-center dawat_color fw-bold">{{ $dofa->title }}</h4>
                            </div>


                            <div class="work_plan">
                                <h5>
                                    <b class="text-success">কর্মপরিকল্পনা</b>
                                </h5>
                                <ul>
                                    @foreach ($dofa->department_plans as $plan)
                                        {{-- @dd($dofa->department_plans) --}}
                                        <li>
                                            {{ $plan->plan_details }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
