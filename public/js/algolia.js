(function () {
    const client = algoliasearch('NN4LX8BBKT', 'b8423c983e0b50a1df0fceabfd060ce3');
    const products = client.initIndex('products');
    var locale = document.getElementsByTagName("html")[0].getAttribute("lang");

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
            displayKey: `name`,
            name: 'product',
            templates: {
                suggestion(suggestion) {

                    console.log(suggestion);
                    // return `
                    //         <div class="algolia-result">
                    //         <img src="${window.location.origin}/${suggestion.image}" alt="" class="algolia-thumb">
                    //         <div class="algolia-info">
                    //             <span>
                    //                 ${locale === 'ar' ? suggestion._highlightResult.ar.name.value : suggestion._highlightResult.en.name.value}
                    //             </span>
                    //             <span class="algolia-details">
                    //                 ${locale === 'ar' ? suggestion._highlightResult.ar.details.value : suggestion._highlightResult.en.details.value}
                    //             </span>
                    //         </div>
                    //         <span>$${(suggestion.price / 100 ).toFixed(2)}</span>
                    //         </div>
                    //             `;
                },
                empty: '<div class="aa-empty">No matching products</div>',
            },
        },
    ).on('autocomplete:selected', function (event, suggestion, dataset) {
        window.location.href = window.location.origin + `/${locale}/shop/${suggestion.slug}`
    });

})();
