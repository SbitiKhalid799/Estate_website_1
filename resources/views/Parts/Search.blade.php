<link rel="stylesheet" href="{{ asset('css/Parts.css/Search.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<form class="recherche" action="#search_bar">
    <div class="home-bottom">
        <div class="container">
            <div class="box-home-bottom">
                <select class="form-select border-0 py-3 w-100 custom-select-outline">
                        <option selected>Location</option>
                        <option value="1">ville 1</option>
                        <option value="2">ville 2</option>
                        <option value="3">ville 3</option>
                </select>
            </div>
            <div class="box-home-bottom">
                <select class="form-select border-0 py-3 w-100 custom-select-outline">
                    <option value="1">Shoose a Category</option>
                    <option value="2">Villa</option>
                    <option value="3">House</option>
                </select>
            </div>
            <div class="box-home-bottom">
                <select name='search_with_offers'  class="form-select border-0 py-3 w-100 custom-select-outline">
                    <option selected value="all_offers">All offers</option>
                    <option value="Purchase" class="text text-primary"  >Purchase</option> <!-- Achat -->
                    <option value="Rental" class="text text-secondary" >Rental</option> <!-- location -->
                </select>
            </div>
            <div class="box-home-bottom">
                <div class="btn-group w-100 h-100">
                    <button class="btn btn-light dropdown-toggle form-select border-0 py-3 w-100 custom-select-outline" type="button" id="dropdownMenuClickable" data-bs-toggle="dropdown" data-bs-auto-close="false" aria-expanded="false">
                      Range of Price
                    </button>
                    <ul class="dropdown-menu px-2" aria-labelledby="dropdownMenuClickable">
                      <li class="input-group mb-1">
                        <span class="input-group-text"  id="basic-addon1">Max</span>
                        <input class="form-control" name='search_with_maximum_price' type="number" value="{{$MaxPrice}}" max="{{$MaxPrice}}" placeholder="Max">
                      </li>
                      <li class="input-group">
                        <span class="input-group-text" id="basic-addon1">Min</span>
                        <input class="form-control" name='search_with_minimum_price' type="number" value="{{$MinPrice}}" min='{{$MinPrice}}' placeholder="Min">
                      </li>
                    </ul>
                  </div>
            </div>
            <div class="box-home-bottom">
                <button type="submit" class="btn btn-primary border-0 w-100 py-3"><i class="fas fa-search"></i>
            </div>
        </div>
    </div>
    </div>


</form>

<!------------------------------------------------------------------------------------------------->

