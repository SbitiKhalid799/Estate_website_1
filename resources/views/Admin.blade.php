@extends('Layout',["title"=>"Admin Page"])

@section("body")

<link rel="stylesheet" href="{{ asset('css/Admin.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<?php
        $content = "
        <div class='header-bottom' style='margin-top:-10px;'>
        <div class='container'>

        <a href='#' class='logo'>
          <img src='/images/logo.png' alt='Homeverse logo'>
        </a>

        <nav class='navbar'  data-navbar>

          <div class='navbar-top' >

            <a href='#' class='logo'>
              <img src='/images/logo.png' alt='Homeverse logo'>
            </a>

            <button class='nav-close-btn' data-nav-close-btn aria-label='Close Menu'>
              <ion-icon name='close-outline'></ion-icon>
            </button>

          </div>

          <div class='navbar-bottom'>
            <ul class='navbar-list'>

              <li>
                <a href='#home' class='navbar-link' data-nav-link>Home</a>
              </li>

              <li>
                <a href='#about' class='navbar-link' data-nav-link>About</a>
              </li>

              <li>
                <a href='#service' class='navbar-link' data-nav-link>Service</a>
              </li>

              <li>
                <a href='#property' class='navbar-link' data-nav-link>Property</a>
              </li>

              <li>
                <a href='#blog' class='navbar-link' data-nav-link>Blog</a>
              </li>

              <li>
                <a href='#contact' class='navbar-link' data-nav-link>Contact</a>
              </li>

            </ul>
          </div>

        </nav>

        <div class='header-bottom-actions'>

          <button class='header-bottom-actions-btn' aria-label='Search'>
            <ion-icon name='search-outline'></ion-icon>

            <span>Search</span>
          </button>

          <button class='header-bottom-actions-btn' aria-label='Profile'>
            <ion-icon name='person-outline'></ion-icon>

            <span>Profile</span>
          </button>

          <button class='header-bottom-actions-btn' data-nav-open-btn aria-label='Open Menu'>
            <ion-icon name='menu-outline'></ion-icon>
            <span>Menu</span>
          </button>

        </div>

        <div>
            <button class='btn btn-primary btn-custom newUser' data-bs-toggle='modal' data-bs-target='#userForm'>Add offer</button>
            </div>

      </div>
        ";
?>

<header>
    @include("Parts.Header",["content"=>$content])
</header>

<main class="main-admin">
    <div>
        @include("Parts.Landing")
    </div>
    <div>
        @include("Parts.Search")
    </div>
    <div>
        <div class="mx-5">
            <h2 class="main-title">Offers</h2>
            <div class="row">
                <div class="col-12">
                    <table class="table table-striped table-hover mt-3">
                        <thead class="text-center">
                            <tr class="table-primary">
                                <th>Proprietaire</th>
                                <th>Telephon</th>
                                <th>Location</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Type of offer</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="data">
                        @foreach($Offres as $Offre)
                            <tr>
                                <th class="text-center">{{$Offre->Proprietaire}}</th>
                                <th class="text-center">{{$Offre->tel}}</th>
                                <th class="text-center">{{$Offre->Location}}</th>
                                <th class="text-center">{{$Offre->Category}}</th>
                                <th class="text-center">{{$Offre->Price}} DH</th>
                                <th class="text-center {{$Offre->Type_Offre === 'Purchase' ? 'text text-primary' :'text text-secondary' }}">
                                    {{$Offre->Type_Offre}}
                                    @if($Offre->Type_Offre === 'Purchase')
                                    <i class="fas fa-shopping-cart"></i>
                                    @else
                                    <i class="fas fa-key"></i>
                                    @endif
                                </th>
                                <td class="d-flex justify-content-center align-items-center">
                                    <a class="btn btn-outline-primary" href="{{ route("Offres.show", $Offre->id) }}"><i class="fas fa-info-circle"></i></a>
                                    <div>
                                        <button class="btn btn-outline-warning" data-bs-toggle='modal' data-bs-target="#update{{ $Offre->id }}" ><i class="fas fa-pencil-alt"></i></button>
                                        <div class="modal fade pb-5 my-5" id="update{{ $Offre->id }}">
                                            <div class="modal-dialog modal-dialog-centered modal-lg my-5">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update the offer</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <!-- Form fields similar to create form -->
                                                       <div class="text-center">
                                                           <label  class="custom-file-upload">
                                                              <i class="bi bi-cloud-arrow-up"></i> Upload Image
                                                             <input type="file" multiple name="images" onchange="previewImages(event,'previewContainer')">
                                                    </label>
                                                     </div>
                                                    <div class="text-center mt-3" id="previewContainer">
                                                        <!-- Image previews will be added here -->
                                                    </div>
                                                        <form action="{{ route('Offres.update', $Offre->id) }}" id="updateForm{{ $Offre->id }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3">
                                                                <label for="Proprietaire" class="form-label">Proprietaire:</label>
                                                                <input class="form-control" value="{{ $Offre->Proprietaire }}" type="text" name="Proprietaire" id="Proprietaire">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="tel" class="form-label">Telephon:</label>
                                                                <input class="form-control" value="{{ $Offre->tel }}" type="text" minlength="10" maxlength="14" name="tel" id="tel">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="Location" class="form-label">Location:</label>
                                                                <input class="form-control" value="{{ $Offre->Location }}" type="text" name="Location" id="Location">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="Category" class="form-label">Category:</label>
                                                                <select class="form-select" name="Category" id="Category">
                                                                    <option selected>Choose category</option>
                                                                    <option value="1" {{ $Offre->Category == 1 ? 'selected' : '' }}>Category 1</option>
                                                                    <option value="2" {{ $Offre->Category == 2 ? 'selected' : '' }}>Category 2</option>
                                                                    <option value="3" {{ $Offre->Category == 3 ? 'selected' : '' }}>Category 3</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="Price" class="form-label">Price:</label>
                                                                <div name="Price" class="input-group">
                                                                    <input name="Price" type="number" value="{{ $Offre->Price }}" class="form-control" id="Price" placeholder="Enter price" aria-label="Price" aria-describedby="basic-addon2">
                                                                    <span class="input-group-text">DH</span>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="Type_Offre" class="form-label">Type of offer:</label>
                                                                <select name="Type_Offre" class="form-select" id="Type_Offre">
                                                                    <option selected>Choose category</option>
                                                                    <option value="Purchase" {{ $Offre->Type_Offre == 'Purchase' ? 'selected' : '' }}>Purchase</option>
                                                                    <option value="Rental" {{ $Offre->Type_Offre == 'Rental' ? 'selected' : '' }}>Rental</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="Descreption" class="form-label">Descreption:</label>
                                                                <textarea class="form-control" name="Descreption" id="Descreption" cols="30" rows="10">{{ $Offre->Descreption }}</textarea>
                                                            </div>
                                                            <!-- autres champs du formulaire -->
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" form="updateForm{{ $Offre->id }}" class="btn btn-primary submit">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{ route('Offres.destroy', $Offre->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
    <!--Modal Form-->
    <div class="modal fade pb-5 my-5" id="userForm">
        <div class="modal-dialog modal-dialog-centered modal-lg my-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Fill the Form</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id='formImages1' action="{{ route('images.store', ['id' => 10]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="text-center">
                            <label for="imgInput" class="custom-file-upload">
                                <i class="bi bi-cloud-arrow-up"></i> Upload Image
                                <input type="file" multiple name="images[]" id="imgInput" onchange="previewImages(event, 'previewContainer1')">
                            </label>
                        </div>
                        <div class="text-center mt-3" id="previewContainer1">
                            <!-- Image previews will be added here -->
                        </div>
                        <button type="submit" >Ok</button>
                    </form>
                    <form action="{{ route('Offres.store') }}" id="createForm" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="Proprietaire" class="form-label">Proprietaire:</label>
                            <input class="form-control" type="text" name="Proprietaire" id="Proprietaire">
                        </div>
                        <div class="mb-3">
                            <label for="tel" class="form-label">Telephon:</label>
                            <input class="form-control" type="text" minlength="10" maxlength="14" name="tel" id="tel">
                        </div>
                        <div class="mb-3">
                            <label for="Location" class="form-label">Location:</label>
                            <input class="form-control" type="text" name="Location" id="Location">
                        </div>
                        <div class="mb-3">
                            <label for="Category" class="form-label">Category:</label>
                            <select class="form-select" name="Category" id="Category">
                                <option selected>Choose category</option>
                                <option value="1">Category 1</option>
                                <option value="2">Category 2</option>
                                <option value="3">Category 3</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Price" class="form-label">Price:</label>
                            <div name="Price" class="input-group">
                                <input name="Price" type="number" class="form-control" id="Price" placeholder="Enter price" aria-label="Price" aria-describedby="basic-addon2">
                                <span class="input-group-text">DH</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="Type_Offre" class="form-label">Type of offer:</label>
                            <select name="Type_Offre" class="form-select" id="Type_Offre">
                                <option selected>Choose category</option>
                                <option value="Purchase">Purchase</option>
                                <option value="Rental">Rental</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Descreption" class="form-label">Descreption:</label>
                            <textarea class="form-control" name="Descreption" id="Descreption" cols="30" rows="10"></textarea>
                        </div>
                        <!-- autres champs du formulaire -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button onclick="submit_of_Adding()" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="{{ asset('js/Admin.js')}}"></script>
@endsection
