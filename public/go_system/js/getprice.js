

    var id_leather = null;
    var id_coverage = null;
    var type_car    = null;
    let selectedColors = [];
    var selectedpattern = [];
    let colorPrice = 0;
    var designprice = 0;
    var DesignJsonArray;
    var Total = 0;
    var Priceseat = 0;
    var Priceinterior = 0;
    var itemcode = 0;
    var colorJsonArray;
    var selectedInteriors = [];
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    function editcolor() {
            $('#pick-color').toggle();
    }

    function editdesign() {
        $('#pick-design').toggle();
    }
    $(document).ready(function() {
      // Toggle pick-color when clicking on "Pick Color"
      $('#toggleColor').click(function() {
        if(id_leather != null){
            $('#pick-color').toggle();
        }

      });

      $('#editcolor').click(function() {
        $('#pick-color').toggle();
      });
    // Hide pick-color when clicking the close icon
    $('#closeIcon').click(function(event) {
      event.preventDefault(); // Prevent the link's default behavior
      $('#pick-color').hide();
    });


    $('#cartype').change(function() {
        type_car    = $('#cartype').val();
        if(type_car != null){

        }
        fetchPatternDesign(id_leather);
        fetchColorData(id_leather);

        document.getElementById('selectedColors').innerHTML = '';
        document.getElementById('selectedDesign').innerHTML = '';
        document.querySelectorAll('.color-column-list').forEach(item => {
            item.classList.remove('selected');
        });
        document.querySelectorAll('.card-leather-type').forEach(item => {
            item.classList.remove('selected');
        });

        selectedColors = [];
        selectedpattern = [];
        colorPrice = 0;
        designprice = 0;
        Total = 0.00;
        $('#toggleDesign').show();
        $('#toggleColor').show();
        document.getElementById('totalall').innerText = 'RM' + Total.toFixed(2);
        updateSubmitButtonState();
    })


    $('#donebuttoncolor').click(function(event) {
        event.preventDefault(); // Prevent the link's default behavior
        $('#pick-color').hide();
      });

    //Toggle Design
    $('#toggleDesign').click(function() {
        if(id_leather != null){
            $('#pick-design').toggle();
        }

      });

      $('#editdesign').click(function() {
        if(id_leather != null){
            $('#pick-design').toggle();
        }
      });

      $('#closeIcondesign').click(function(event) {
        event.preventDefault(); // Prevent the link's default behavior
        $('#pick-design').hide();
      });

      $('#donebuttondesign').click(function(event) {
        event.preventDefault(); // Prevent the link's default behavior
        $('#pick-design').hide();
      });





  });
  function interiorSelected(checkbox) {
    if(id_leather != null){
        var selectedInteriorIds = [];
        $('input[type="checkbox"]:checked').each(function() {
            selectedInteriorIds.push($(this).val());
        });
          // Get the CSRF token value


    $.ajax({
        type: "POST",
        url: '/product_project/gosford/f/interiorselected',
        data: {
            _token: csrfToken,
            interiorIds: selectedInteriorIds
        },
        success: function(response) {
            // Reset Priceinterior
            Priceinterior = 0;

            // Handle the response and format the data as needed
            var interiorList = '';
            $.each(response, function(index, interior) {
                const cataniaPrice = interior.catania_price;
                const nappaPrice   = interior.nappa_price;
                const interiorPrice  = id_leather == 1 ? cataniaPrice : nappaPrice;
                Priceinterior += parseFloat(interiorPrice);

                interiorList += `<div class="list-color-detail" data-id="${interior.id_interior}" style="width: 100%;">
                    <div style="display:flex; gap:13px">
                        <img src="${interior.urlimage}" alt="${interior.name_interior}">
                        <div class="name-color-list">${interior.name_interior}</div>
                    </div>
                    <div style="display:flex;gap:13px">
                        <div class="name-color-list">RM${interiorPrice}</div>
                    </div>
                </div>`;
            });

            // Update the displayed interior list
            $('#interior-list').html(interiorList);

            // Update the displayed price
            updateSubmitButtonState();
        }
    });
    }else{
        alert("choose the material first");
    }



}
var interiorPrices = {};  // Object to store interior prices

$(document).on('change', 'input[type="checkbox"]', function() {
    var interiorId = $(this).val();
    var interiorPrice = parseFloat($('#price-' + interiorId).text().replace('RM', ''));

    // Store the interior price
    interiorPrices[interiorId] = interiorPrice;

    if (!$(this).is(':checked')) {
        // Remove the corresponding interior from the list
        Priceinterior=0;
        $('#interior-list').find('div[data-id="' + interiorId + '"]').remove();

    }

    // Update the displayed price
    updateTotalPrice();
});


function updateTotalPrice() {
    var totalPrice = 0;
    var updatedSelectedInteriors = [];

    $('input[type="checkbox"]:checked').each(function() {
        var interiorId = $(this).val();
        var interiorPrice = parseFloat($('#price-' + interiorId).text().replace('RM', ''));

        totalPrice += interiorPrice;

        // Collect interior data
        var interiorData = {
            id: interiorId,
        };

        // Add interior data to the updatedSelectedInteriors array
        updatedSelectedInteriors.push(interiorData);
    });

    selectedInteriors = updatedSelectedInteriors;
    updateSubmitButtonState();
}

  function MaterialSelected(element,idleather) {
    // Remove the 'selected' class from all elements
    const elements = document.querySelectorAll('.card-material-type');
    elements.forEach(el => el.classList.remove('selected'));

    // Add the 'selected' class to the clicked element
    element.classList.add('selected');
    id_leather = idleather;
    if(idleather != null){
        $('#interior-list').empty();
    }
    fetchColorData(id_leather);
    fetchPatternDesign(id_leather);
    fetchInteriorDesign(id_leather);
    updateSubmitButtonState();

}

function fetchInteriorDesign(idLeather){
    $.ajax({
        type: "GET",
        url: '/api/getInteriorData',
        data: {
            leatherCode: idLeather,
            _token: csrfToken,
        },
        success: function(response) {
            updateInteriorUI(response,idLeather);
        },
        error: function(xhr, status, error) {
            console.error('Failed to fetch color data:', error);
        }
    });
}

function updateInteriorUI(response, idLeather) {
    $('#interiorContainer').empty();
    $.each(response, function(i, vinterior) {
        var checkboxHtml = `
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="${vinterior.id_interior}" id="checkbox_${idLeather}_${i}" onclick="interiorSelected(this)">
                <label class="form-check-label" for="checkbox_${idLeather}_${i}">
                    ${vinterior.name_interior}
                </label>
            </div>
        `;
        $('#interiorContainer').append(checkboxHtml);
    });
}



function fetchPatternDesign(idLeather){
    $.ajax({
        type: "GET",
        url: '/api/getPatternData',
        data: {
            leatherCode: idLeather,
            row: type_car,
            _token: csrfToken,
        },
        success: function(response) {
            updatePatternUI(response,idLeather);
        },
        error: function(xhr, status, error) {
            console.error('Failed to fetch color data:', error);
        }
    });
}

async function updatePatternUI(patternData, idLeather) {
    const patternContainer = document.querySelector('.pattern-list-container');
    patternContainer.innerHTML = '';

    // Function to create a loading indicator
    const createLoadingElement = () => {
        const loadingElement = document.createElement('div');
        loadingElement.classList.add('loading-indicator');
        loadingElement.innerHTML = 'Loading...';
        return loadingElement;
    };

    // Use Promise.all to await all image promises
    const patternElements = await Promise.all(patternData.map(async (pattern) => {
        const loadingElement = createLoadingElement();
        patternContainer.appendChild(loadingElement);

        try {
            const imageUrl = await getimage(pattern.img);
            const cataniaPrice = pattern.catania_price;
            const nappaPrice = pattern.nappa_price;
            const patternPrice = idLeather == 1 ? cataniaPrice : nappaPrice;

            const patternElement = document.createElement('div');
            patternElement.classList.add('color-column-list');
            patternElement.dataset.patternName = pattern.name_pattern;
            patternElement.dataset.img = imageUrl;
            patternElement.dataset.baseImg = await getimage(pattern.base_img);
            patternElement.dataset.colorImg = await getimage(pattern.color_img);
            patternElement.dataset.price = patternPrice;

            patternElement.innerHTML = `
                <img class="img-pattern-option" src="${imageUrl}" alt="">
                <div style="font-weight: bold; color: #555555;">${pattern.name_pattern}</div>
                <div class="extra-price-pattern">${patternPrice > 0 ? `+RM${patternPrice}` : ''}</div>
            `;

            // Add a click event listener to each pattern element
            patternElement.addEventListener('click', function () {
                selectPattern(this, pattern.name_pattern, imageUrl, patternElement.dataset.baseImg, patternElement.dataset.colorImg, patternPrice);
            });

            // Remove the loading indicator
            patternContainer.removeChild(loadingElement);

            return patternElement;
        } catch (error) {
            console.error('Error fetching image:', error);
            loadingElement.innerHTML = 'Error loading pattern';
            // Remove the loading indicator
            patternContainer.removeChild(loadingElement);
            return null;
        }
    }));

    // Append the pattern elements to the container
    patternElements
        .filter((patternElement) => patternElement !== null)
        .forEach((patternElement) => {
            patternContainer.appendChild(patternElement);
        });
}



function fetchColorData(idLeather) {
    $.ajax({
        type: "GET",
        url: '/api/getColorData',
        data: {
            leatherCode: idLeather,
            row: type_car,
            _token: csrfToken,
        },
        success: function(response) {
            updateColorUI(response,idLeather);
        },
        error: function(xhr, status, error) {
            console.error('Failed to fetch color data:', error);
        }
    });
}



function getimage(id) {
    return new Promise(function(resolve, reject) {
      $.ajax({
        type: "GET",
        url: '/api/getImage',
        data: {
          srcImage: id,
          _token: csrfToken,
        },
        success: function(response) {
          var image = response.imagePath;
          resolve(image);
        },
        error: function(xhr, status, error) {
          console.error('Failed to fetch color data:', error);
          reject(error);
        }
      });
    });
  }



  async function updateColorUI(colorData, idLeather) {
    const colorContainer = document.querySelector('.color-list-container');
    colorContainer.innerHTML = ''; // Clear existing content

    // Function to create a loading indicator
    const createLoadingElement = () => {
        const loadingElement = document.createElement('div');
        loadingElement.classList.add('loading-indicator');
        loadingElement.innerHTML = 'Loading...';
        return loadingElement;
    };

    // Use Promise.all to await all image promises for color elements
    const colorElements = await Promise.all(colorData.map(async (color) => {
        const loadingElement = createLoadingElement();
        colorContainer.appendChild(loadingElement);

        try {
            const imageUrl = await getimage(color.image);
            const cataniaPrice = color.catania_price;
            const nappaPrice = color.nappa_price;
            const colorsPrice = idLeather == 1 ? cataniaPrice : nappaPrice;

            const colorColumn = document.createElement('div');
            colorColumn.classList.add('color-column-list');

            colorColumn.onclick = () => selectColor(colorColumn, color.name, imageUrl, colorsPrice, color.hex_color, color.code);

            const imgColor = document.createElement('img');
            imgColor.classList.add('img-color-option');
            imgColor.src = imageUrl;
            imgColor.alt = '';
            imgColor.id = 'imgcolor';

            const nameColor = document.createElement('div');
            nameColor.style.fontWeight = 'bold';
            nameColor.style.color = '#555555';
            nameColor.textContent = color.name;
            nameColor.id = 'namecolor';

            const codeColor = document.createElement('div');
            codeColor.style.fontSize = 'smaller';
            codeColor.textContent = color.code;

            const extraPriceColor = document.createElement('div');
            extraPriceColor.classList.add('extra-price-color');
            if (colorsPrice > 0) {
                extraPriceColor.textContent = `+RM${colorsPrice}`;
            }

            colorColumn.appendChild(imgColor);
            colorColumn.appendChild(nameColor);
            colorColumn.appendChild(codeColor);
            colorColumn.appendChild(extraPriceColor);

            // Remove the loading indicator
            colorContainer.removeChild(loadingElement);

            colorContainer.appendChild(colorColumn);

            return colorColumn;
        } catch (error) {
            console.error('Error fetching image data:', error);
            loadingElement.innerHTML = 'Error loading color';
            // Remove the loading indicator
            colorContainer.removeChild(loadingElement);
            // Handle the error if needed
            return null;
        }
    }));

    // Append the color elements to the container
    colorElements
        .filter((colorElement) => colorElement !== null)
        .forEach((colorElement) => {
            colorContainer.appendChild(colorElement);
        });
}




function CoverageSelected(elemento,idcoverage){
     // Remove the 'selected' class from all elements
     const elements = document.querySelectorAll('.card-leather-types');
     elements.forEach(els => els.classList.remove('selected'));

     // Add the 'selected' class to the clicked element
     elemento.classList.add('selected');
     id_coverage = idcoverage;
     updateSubmitButtonState();
}




  function updateSelectionMode() {
    const singleColorMode = document.getElementById('flexRadioDefault1').checked;
    selectedColors = singleColorMode ? [] : selectedColors.slice(0, 2);
    $('#toggleColor').show();
    document.getElementById('selectedColors').innerHTML = '';
    document.querySelectorAll('.color-column-list').forEach(item => {
        item.classList.remove('selected');
    });
    selectedColors = [];
    colorPrice = 0;
    document.getElementById('selectedPrice').innerText = 'RM 0.00';
    updateSubmitButtonState();
    // updateSelectedDetails();
  }


  function selectColor(element, name, img, price,hexColor,code) {
    const singleColorMode = document.getElementById('flexRadioDefault1').checked;

    if (singleColorMode) {
        element.classList.add('selected');
      // Single color mode, allow only one selection
      selectedColors = [{ name, img, price,code }];
      document.getElementById('colorimage').style.backgroundColor = hexColor;
      colorPrice = price;
      if (selectedColors.find(item => item.code === code)) {
      }
    } else {
      // Two-tone color mode, allow up to two selections
      if (selectedColors.find(item => item.code === code)) {
        // Deselect if already selected

        selectedColors = selectedColors.filter(item => item.code !== code);
        colorPrice -= price;
        element.classList.toggle('selected');
      } else {
        // Select if not already selected and there are less than 2 selected
        if (selectedColors.length < 2) {
          selectedColors.push({ name, img, price,code });
          colorPrice += price;
        }else{
            maximumselcted();
        }
      }

    }
    updateSelectedDetails();

  }

  function  maximumselcted() {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-danger',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Attention',
        text: "You have exceeded the maximum color selection limit. To choose another color, click on one of the selected colors to delete it, then you can choose another color",
        icon: 'warning',
        showCancelButton: false,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {

            result.dismiss === Swal.DismissReason.cancel
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            // swalWithBootstrapButtons.fire(
            //     'Cancelled',
            //     'Your imaginary file is safe :)',
            //     'error'
            // )
        }
    })

}

  function updateSelectedDetails() {
    // Only remove the border if it's in single color mode
    const singleColorMode = document.getElementById('flexRadioDefault1').checked;
    if (singleColorMode) {

        selectedColors.forEach(item => {
            if (itemcode === 0) {
                selectedColors.forEach(item => {
                    itemcode = item.code;
                     document.querySelectorAll('.color-column-list').forEach(item => {
                            item.classList.remove('selected');
                        });
                });
            }else if(itemcode === item.code){

            }
            else {
                document.querySelectorAll('.color-column-list').forEach(item => {
                    item.classList.remove('selected');
                });
                itemcode = item.code;
            }

        });

    }

    // Loop through the selectedColors and set the selected class and handle deselection

    selectedColors.forEach(item => {
      item.code = item.code || ''; // Handle cases where img is undefined
      const element = document.querySelector(`[src='${item.img}']`);
      if (element) {
        // Check if this color is already selected
        const isColorSelected = element.parentElement.classList.contains('selected');

        if (isColorSelected) {
          // If color is already selected, deselect it and remove from selectedColors
          element.parentElement.classList.remove('selected');
          selectedColors = selectedColors.filter(color => color.img !== item.img);
          colorPrice -= item.price;
        } else {
          // If color is not selected, add the selected class
          element.parentElement.classList.add('selected');
        }
      }
    });

    // Update the selected colors and price
    const selectedColorsInfo = selectedColors.map(colorItem => {
      return `
        <div class='list-color-detail'>
          <div style='display:flex;gap:13px'>
            <img src="${colorItem.img}" alt="${colorItem.name}">
            <div class='name-color-list'>${colorItem.name}</div>
          </div>
          <div style='display:flex;gap:13px'>
            <div id="editcolor" onclick='editcolor()' style='cursor:pointer' class='name-color-list'><i class='fa fa-pencil'></i> <u>Edit</u></div>
            <div class='name-color-list'>+RM${colorItem.price}</div>
          </div>
        </div>
      `;
    });

    if (selectedColors.length > 0) {
      $('#toggleColor').hide();
      document.getElementById('selectedColors').innerHTML = selectedColorsInfo.join(' ');
    } else {
      $('#toggleColor').show();
      document.getElementById('selectedColors').innerHTML = '';
    }
    document.getElementById('selectedPrice').innerText = 'RM' + colorPrice.toFixed(2);
    updateSubmitButtonState();
  }


  function selectPattern(element, patternName, imageUrl,baseimage,colorimage, price) {
    // Remove border from all images
    const images = document.querySelectorAll('.img-pattern-option');
    images.forEach(img => img.style.border = 'none');

    // Add border to the selected image
    const selectedImage = element.querySelector('.img-pattern-option');
    selectedImage.style.border = '3px solid brown';

    // Logic to display selected pattern details
    const selectedDesignInfo = `
        <div class='list-color-detail'>
            <div style='display:flex; gap:13px'>
                <img src="${imageUrl}" alt="${patternName}">
                <div class='name-color-list'>${patternName}</div>
            </div>
          <div style='display:flex;gap:13px'>
            <div onclick='editdesign()' style='cursor:pointer' class='name-color-list'><i class='fa fa-pencil'></i> <u>Edit</u></div>
                <div class='name-color-list'>+RM${price}</div>
            </div>
          </div>
    `;

    if (selectedImage) {
        toggleDesign.classList.add('selected');
        $('#toggleDesign').hide();
        $('#normalleather').show();
        $('#changecolor').hide();

        document.getElementById('baseimage').src = baseimage;
        document.getElementById('colorimage').src = colorimage;

        document.getElementById('selectedDesign').innerHTML = selectedDesignInfo;
    } else {
        $('#toggleDesign').show();
        document.getElementById('selectedDesign').innerHTML = '';
    }

    document.getElementById('selectedPriceDesign').innerText = 'RM' + price.toFixed(2);
    designprice=price;
    selectedpattern = [{patternName,imageUrl,price}];
    updateSubmitButtonState();



    // Call the function initially to set the initial state of the submit button

}

function clearall() {
    $('#toggleDesign').show();
    $('#toggleColor').show();
    document.getElementById('selectedColors').innerHTML = '';
    document.getElementById('selectedDesign').innerHTML = '';
    document.querySelectorAll('.color-column-list').forEach(item => {
        item.classList.remove('selected');
    });
    document.querySelectorAll('.card-leather-types').forEach(item => {
        item.classList.remove('selected');
    });
    document.querySelectorAll('.card-leather-type').forEach(item => {
        item.classList.remove('selected');
    });
    document.querySelectorAll('.card-material-type').forEach(item => {
        item.classList.remove('selected');
    });
    id_leather = null;
    id_coverage = null;
    selectedColors = [];
    selectedpattern = [];
    colorPrice = 0;
    designprice = 0;
    Total = 0.00;
    document.getElementById('totalall').innerText = 'RM' + Total.toFixed(2);
    updateSubmitButtonState();

    // Uncheck all checkboxes for interiors
    $('input[type="checkbox"]').prop('checked', false);
    $('#interior-list').empty();
}



function updateSubmitButtonState() {
   console.log('id_leather ='+id_leather);
   console.log('car_type ='+type_car);
   console.log('id_coverage ='+id_coverage);

   colorJsonArray = selectedColors.map(colorItem => {
    return {
        color: colorItem.name,
        price: colorItem.price
    };
   });
   console.log('Selected Colors JSON:', JSON.stringify(colorJsonArray, null, 2));
   DesignJsonArray = selectedpattern.map(item=>{
    return {
        image:item.imageUrl,
        price:item.price,
        name:item.patternName
    }
   })
   console.log('Design JSON:', JSON.stringify(DesignJsonArray, null, 2));
   console.log('Design Price : '+designprice);
   var selectedInteriorsJSON = JSON.stringify(selectedInteriors, null, 2);
   console.log('Selected interior:'+selectedInteriorsJSON);

   let allChecked = true;

    // Check if dropdown and all checkboxes have valid selections
    if (id_leather == null || type_car == null || type_car =='' || selectedColors.length == 0 || selectedpattern == 0) {
        allChecked = false;
        $('#submit').removeClass('color--gray').addClass('color--green');
    }else{
        $('#submit').removeClass('color--green').addClass('color--gray');
        //fetch data use ajax
        if (allChecked) {
            const csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "/product_project/gosford/f/fetchpriceseat",
                type: 'POST',
                data: {
                    type_car: type_car,
                    id_leather: id_leather,
                    id_coverage: id_coverage
                },
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    // Handle the successful response here
                    // console.log('Data fetched successfully:', response);
                    Total = response.price+designprice+colorPrice+Priceinterior;
                    Priceseat = response.price;
                    console.log('Total Price :'+Total);

                    document.getElementById('totalall').innerText = 'RM' + Total.toFixed(2);

                },
                error: function(error) {
                    // Handle errors here
                    console.error('Error fetching data:', error);
                }
            });
        }
    }

    // Enable/disable the submit button based on checkbox state
    $('#submit').prop('disabled', !allChecked);


}


function submitOrder() {
    // Ensure jQuery is properly loaded before using $
    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Assuming type_car, id_leather, id_coverage, selectedpattern, selectedColors, Total are defined elsewhere

    // Convert selected patterns to the desired format
    const designJsonArray = selectedpattern.map(item => ({
        image: item.imageUrl,
        price: item.price,
        name: item.patternName
    }));

    // Convert selected colors to the desired format
    const colorJsonArray = selectedColors.map(colorItem => ({
        color: colorItem.name,
        price: colorItem.price
    }));

    const data = {
        type_car: type_car,
        id_leather: id_leather,
        id_coverage: id_coverage,
        design: designJsonArray,
        color: colorJsonArray,
        interior:selectedInteriors,
        totalprice: Total,
        priceseat:Priceseat
    };

    $.ajax({
        url: "/product_project/gosford/f/submitorder",
        type: 'POST',
        data: data,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function (response) {
            if (response.status === 'success') {
                console.log('Order submitted successfully. URL:', response.url);
                window.location.href = response.url;
            } else {
                console.log('Order submission failed. Response:', response);
                // Optionally inform the user about the failed order
            }
        },
        error: function (error) {
            console.error('Error submitting order:', error);
            // Optionally display an error message to the user
        }
    });
}
