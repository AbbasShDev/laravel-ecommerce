(function () {
    var locale = document.getElementsByTagName("html")[0].getAttribute("lang");

    const search = instantsearch({
        indexName: 'products',
        searchClient: algoliasearch('NN4LX8BBKT', 'b8423c983e0b50a1df0fceabfd060ce3'),
        routing: true,
    });

    search.addWidgets([
        instantsearch.widgets.searchBox({
            container: '#search-box',
            placeholder: locale == 'ar' ? "البحث عن منتجات .." : "Search for products"
        }),
        instantsearch.widgets.hits({
            container: '#hits',
            templates: {
                item: function (item) {
                    return `
                    <a href="${window.location.origin}/${locale}/shop/${item.slug}">
                            <div class="instantsearch-result">
                                <div>
                                    <img src="https://laravel-laramerce.s3.eu-west-3.amazonaws.com/${item.image}" alt="img" class="algolia-thumb-result">
                                </div>
                                <div>
                                    <div class="result-title">
                                        ${locale == 'ar' ? item._highlightResult.ar.name.value : item._highlightResult.en.name.value}
                                    </div>
                                    <div class="result-details">
                                        ${locale == 'ar' ? item._highlightResult.ar.details.value : item._highlightResult.en.details.value}                                    </div>
                                    <div class="result-price">
                                        $${(item.price / 100).toFixed(2)}
                                    </div>
                                </div>
                            </div>
                        </a>
                    `
                },
            },
        }),
        instantsearch.widgets.pagination({
            container: '#pagination',
            totalPages: 20,
            scrollTo: false,
        }),
        instantsearch.widgets.stats({
            container: '#stats',
            templates: {
                text:
                    locale == 'ar' ?
                    `
                    {{^areHitsSorted}}
                    {{#hasNoResults}}لا يوجد نتائج{{/hasNoResults}}
                    {{#hasOneResult}}1 نتيجة{{/hasOneResult}}
                    {{#hasManyResults}}{{#helpers.formatNumber}}{{nbHits}}{{/helpers.formatNumber}} نتيجة{{/hasManyResults}}
                    {{/areHitsSorted}}
                    `
                    :
                        `
                    {{^areHitsSorted}}
                    {{#hasNoResults}}No results{{/hasNoResults}}
                    {{#hasOneResult}}1 result{{/hasOneResult}}
                    {{#hasManyResults}}{{#helpers.formatNumber}}{{nbHits}}{{/helpers.formatNumber}} results{{/hasManyResults}}
                    {{/areHitsSorted}}
                    `
                ,
            },
        }),
        instantsearch.widgets.refinementList({
            container: '#refinement-list',
            attribute: locale === 'ar' ? 'category.ar' : 'category.en',
        }),
    ]);

    search.start();


})();
