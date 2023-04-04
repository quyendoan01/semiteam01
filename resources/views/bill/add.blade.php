@extends('layouts.blank')

@section('content')
    <div class="container-fluid">
        <form method="POST" enctype="multipart/form-data" action="{{ route('store_bill') }}">
            @csrf

            <div style="display:flex;background-color:#fff">

                <div class="bill_add_left" style="width: 35%;padding:16px">
                    <p style="display:inline">Bill ID: </p><span>B{{ $bid }}</span>

                    <select class="form-select form-select-sm" name="type" style="float:right;width:72px;margin:0px 4px" required>
                        <option value="0" style="color:mediumblue">Import</option>
                        <option value="1" style="color:forestgreen">Export</option>
                    </select>
                    <p style="display:inline;float:right">Type<span style="color:red">*</span>: </p><br><br>
                    <p style="display:inline">Customer: </p>
                    <select class="select2" placeholder="Search..." style="width: 50%" name="cus_id" id="mySelect" required>
                        @foreach ($customer as $cus)
                            <option value="{{ $cus->id }}">{{ $cus->cus_name }}</option>
                        @endforeach
                    </select>
                    <a href="{{route('addlc')}}" style="margin:0px 4px; text-decoration:none">+</a>
                    <br><br>
                    <label for="date" style="font-size: 0.9rem">Date:</label>
                    <input type="date" id="date" name="date">
                    <input type="hidden" name="pro_name" id="pro_name">
                    <input type="hidden" name="pro_amount" id="pro_amount">
                    <input type="hidden" name="current_price" id="current_price">
                    <hr>
                    <div class="bill_add_left_middle" id="bill_add_left_middle"
                        style="max-height: 200px; overflow-y: scroll;padding-right:4px">

                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <hr>
                    <div class="bill_add_left_bottom">
                        <span style="float:right;color:rgb(0, 190, 0);font-size:1.1rem;margin:0px 4px">$</span>
                        <span id="total"
                            style="float:right;color:rgb(0, 190, 0);font-size:1.1rem;margin:0px 4px"></span>
                        <h4 style="float:right">Total: </h4><br><br>
                        <a href="{{ route('bill') }}" type="button" class="btn btn-outline-secondary">Back</a>
                        <button type="submit" style="float:right" class="btn btn-success">Submit</button>
                    </div>
                </div>
                <div class="bill_add right" style="width: 65%;min-height:500px">
                    <div>
                    <div class="input-group" style="width: 300px; height: 40px; margin:16px 0px; display:inline-flex">
                        <button type="button" onclick="searchText()" class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></button>
                        <input id="searchInput" type="text" class="form-control" placeholder="Type here...">

                    </div>
                    <a href="{{route('product.create')}}" style="margin: 0px 16px; text-decoration:none;font-size:1rem"> + Add new Product</a>
                    <nav style="float:right;margin:16px 8px 0px 8px">
                        <ul class="pagination justify-content-center">
                            <!-- Previous Page Link -->
                            @if ($product->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $product->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                            @endif

                            <!-- Pagination Elements -->
                            @if($product->lastPage() > 1)
                                @for($i = 1; $i <= $product->lastPage(); $i++)
                                    @if($i == 1 || $i == $product->currentPage() - 2 || $i == $product->currentPage() - 1 || $i == $product->currentPage() || $i == $product->currentPage() + 1 || $i == $product->currentPage() + 2 || $i == $product->lastPage())
                                        @if($i == $product->currentPage())
                                            <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                                        @else
                                            <li class="page-item"><a class="page-link" href="{{ $product->url($i) }}">{{ $i }}</a></li>
                                        @endif
                                    @elseif($i == 2 && $product->currentPage() > 4)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @elseif($i == $product->lastPage() - 1 && $product->currentPage() < $product->lastPage() - 3)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                @endfor
                            @endif

                            <!-- Next Page Link -->
                            @if ($product->hasMorePages())
                                <li class="page-item"><a class="page-link" href="{{ $product->nextPageUrl() }}" rel="next">&raquo;</a></li>
                            @else
                                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                            @endif
                        </ul>
                    </nav>
                    </div>

                    <div class="list_product_in_bill" id="list_product_in_bill1">
                        @foreach ($product as $product1)
                            <button type="button" onclick=""
                                @if ($product1->pro_discount <= 0) value="{{ $product1->pro_name }},{{ $product1->unit_price }},{{ $product1->id}}"
                        @else
                        value="{{ $product1->pro_name }},{{ $product1->unit_price - ($product1->unit_price * $product1->pro_discount) / 100 }},{{ $product1->id}}" @endif
                                class="list_product_in_bill_single">
                                <input type="hidden"
                                    value="{{ $image = DB::table('image')->select('img_infor')->where('pro_id', '=', "$product1->id")->get() }}">

                                @foreach ($image as $image)
                                    <div class="home-product-item__imga"
                                        style="background-image: url(); width: 80px;height:80px;display:flex;float:left">
                                        <div style="max-width:100%;height:80px;margin:auto;display:flex">
                                            <img src="{{ asset("image/product/$image->img_infor") }}"
                                                style="width:100%;height:100%;margin:auto;display:block">
                                        </div>
                                    </div>
                                @endforeach
                                <div style="padding: 3px;width:60%;display:block" class="pro_single">
                                    <p style="margin: 0; font-size:0.9rem; text-align:left;width:100%;display:block">
                                        <b>{{ $product1->pro_name }}</b>
                                    </p>
                                    @if ($product1->pro_discount <= 0)
                                        <p style="margin: 0; color: rgb(0, 190, 0);display:flex;text-align:left;justify-content: space-between;">
                                            {{ $product1->unit_price }}$
                                            @if ($product1->pro_quantity > 5)
                                            <span style="margin: 0;float: right;color:#000">
                                                Am: {{$product1->pro_quantity}}
                                            </span>
                                            @else
                                            <span style="margin: 0;float: right;color: red">
                                                Am: {{$product1->pro_quantity}}
                                            </span>
                                            @endif
                                        </p>
                                    @else
                                        <p style="margin: 0; color:rgb(0, 190, 0);display:flex;text-align:left;justify-content: space-between;">
                                            {{ $product1->unit_price - ($product1->unit_price * $product1->pro_discount) / 100 }}$
                                            @if ($product1->pro_quantity > 5)
                                            <span style="margin: 0;float: right;color:#000">
                                                Am: {{$product1->pro_quantity}}
                                            </span>
                                            @else
                                            <span style="margin: 0;float: right;color: red">
                                                Am: {{$product1->pro_quantity}}
                                            </span>
                                            @endif
                                        </p>
                                    @endif

                                </div>
                            </button>
                        @endforeach

                    </div>

                </div>
            </div>
        </form>

    </div>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
        $('#mySelect').select2();

        // Attach listener to change event
        $('#mySelect').on('change', function() {
            // Get selected value
            var selectedValue = $(this).val();

        });
        var date = new Date();
        var formattedDate = date.toISOString().substr(0, 10);
        document.getElementById("date").value = formattedDate;

        var myButtons = document.querySelectorAll(".list_product_in_bill_single");
        var itemsContainer = document.getElementById("bill_add_left_middle");
        updateTotal();

        function removeDiv() {
            var div = document.getElementById("bill_middle_product");
            div.parentNode.removeChild(div);
            updateTotal();
        }
        var listProductInBill = [];
        myButtons.forEach(button => {
            button.addEventListener("click", function() {
                if (!listProductInBill.includes(this.value)){
                    listProductInBill.push(this.value);
                    var buttonValue = this.value;
                var bValueSp = buttonValue.split(",");


                var secondDiv = document.createElement("div");

                var newP1 = document.createElement("p");
                var newB = document.createElement("b");
                var newButton = document.createElement("button");
                var newBr = document.createElement("br");
                var newInput = document.createElement("input");
                var newP3 = document.createElement("input");
                var newInput2 = document.createElement("input");

                secondDiv.className = "bill_middle_product";
                secondDiv.id = "bill_middle_product";
                newP1.style.display = "inline";
                newB.innerHTML = bValueSp[0];
                newB.value = bValueSp[0];
                newInput2.type = "hidden";
                newInput2.value = bValueSp[2];
                newInput2.className = "pro_name";
                newButton.className = "btn btn-outline-secondary";
                newButton.style.float = "right";
                newButton.style.padding = "0px 6px";
                newButton.style.border = "none";
                newButton.innerHTML = "x";
                newButton.onclick = function() {
                    secondDiv.parentNode.removeChild(secondDiv);
                    updateTotal();

                };
                newButton.type = "button";
                newInput.className = "quantity";
                newInput.type = "number";
                newInput.value = 1;
                newInput.style.textAlign = "center";
                newP3.style.float = "right";
                newP3.value = bValueSp[1];
                newP3.className = "price";
                newP3.type = "number";
                newP3.step = "0.01";
                newP3.value = bValueSp[1];


                newP1.appendChild(newB);
                secondDiv.appendChild(newP1);
                secondDiv.appendChild(newButton);
                secondDiv.appendChild(newInput2);
                secondDiv.appendChild(newBr);
                secondDiv.appendChild(newInput);
                secondDiv.appendChild(newP3);

                itemsContainer.appendChild(secondDiv);
                var quantityInputs = itemsContainer.querySelectorAll(".quantity");
                var priceInputs = itemsContainer.querySelectorAll(".price");
                for (var i = 0; i < quantityInputs.length; i++) {
                    quantityInputs[i].addEventListener("change", updateTotal);
                    priceInputs[i].addEventListener("change", updateTotal);
                }

                // update the total
                updateTotal();
                }

            });



        });



        function updateTotal() {
            var total = 0;

            // loop through all the item divs and add up the values
            var itemDivs = itemsContainer.querySelectorAll("div");
            for (var i = 0; i < itemDivs.length; i++) {
                var quantity = parseFloat(itemDivs[i].querySelector(".quantity").value);
                var price = parseFloat(itemDivs[i].querySelector(".price").value);

                total += quantity * price;
            }
            document.getElementById("total").innerHTML = total.toFixed(2);


            var inputElementsName = document.getElementsByClassName("pro_name");
            var inputElementsQuan = document.getElementsByClassName("quantity");
            var inputElementsPrice = document.getElementsByClassName("price");

            var inputValuesName = [];
            var inputValuesQuan = [];
            var inputValuesPrice = [];
            for (let i = 0; i < inputElementsName.length; i++) {
                inputValuesName.push(inputElementsName[i].value);
            }
            for (let i = 0; i < inputElementsQuan.length; i++) {
                inputValuesQuan.push(inputElementsQuan[i].value);
            }
            for (let i = 0; i < inputElementsPrice.length; i++) {
                inputValuesPrice.push(inputElementsPrice[i].value);
            }

            var combinedInputsName = inputValuesName.join(", ");
            var combinedInputsQuan = inputValuesQuan.join(", ");
            var combinedInputsPrice = inputValuesPrice.join(", ");

            document.getElementById("pro_name").value = combinedInputsName;
            document.getElementById("pro_amount").value = combinedInputsQuan;
            document.getElementById("current_price").value = combinedInputsPrice;

        }
        function searchText() {
        var searchQuery = document.getElementById("searchInput").value;
        var buttons = document.querySelectorAll(".pro_single");
        var found = false;

        for (var i = 0; i < buttons.length; i++) {
          var pTag = buttons[i].querySelector("p b");
          if (pTag.innerText.includes(searchQuery)) {
            buttons[i].parentNode.style.display = "flex";
            found = true;
          } else {
            buttons[i].parentNode.style.display = "none";
          }
        }

        if (!found) {
          alert("No matches found.");
        }
      }
    </script>

@endsection
