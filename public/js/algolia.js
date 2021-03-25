(function () {
    const client = algoliasearch('O28RQ1I31E', '44bc64e609062f72d24fcc242a14a1e1');
    const products = client.initIndex('products');
    var locale = document.getElementsByTagName("html")[0].getAttribute("lang");
    let enterKeyClicked = false;

    autocomplete(
        '#aa-search-input',
        {
            debug: true,
            templates: {
                dropdownMenu:
                    '<div class="aa-dataset-product"></div>'
            },
        },
        {
            source: autocomplete.sources.hits(products, {hitsPerPage: 10}),
            displayKey: `${locale}.name`,
            name: 'product',
            templates: {
                suggestion(suggestion) {

                    return `
                            <div class="algolia-result">
                            <img src="https://laravel-laramerce.s3.eu-west-3.amazonaws.com/${suggestion.image}" alt="" class="algolia-thumb">
                            <div class="algolia-info">
                                <span>
                                    ${locale === 'ar' ? suggestion._highlightResult.ar.name.value : suggestion._highlightResult.en.name.value}
                                </span>
                                <span class="algolia-details">
                                    ${locale === 'ar' ? suggestion._highlightResult.ar.details.value : suggestion._highlightResult.en.details.value}
                                </span>
                            </div>
                            <span>$${(suggestion.price / 100 ).toFixed(2)}</span>
                            </div>
                                `;
                },
                empty: '<div class="aa-empty">No matching products</div>',
            },
        },
    ).on('autocomplete:selected', function (event, suggestion, dataset) {
        window.location.href = window.location.origin + `/${locale}/shop/${suggestion.slug}`
        enterKeyClicked = true;
    }).on('keyup', function (e) {
        if (e.keyCode == 13 && !enterKeyClicked){
            window.location.href = window.location.origin + `/${locale}/` + 'search?products%5Bquery%5D=' + document.getElementById('aa-search-input').value;
        }
    });

})();
