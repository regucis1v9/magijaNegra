<div class="overlay  none" id="overlay"></div>
    <div class="filters none" id="filters">
        <div class="top">
        <h1 class="filtersTitle">Filters</h1>
            <div class="filterSection">
                <button class="filterOption" onclick="toggleFilter('solvedState')"> Price </button>
                <div class=" none" id="solvedState">
                    <div class="option">
                        <label for="">Min Price</label>
                        <input type="text" id="minPrice">
                    </div>
                    <div class="option">
                        <label for="">Max Price</label>
                        <input type="text" id="maxPrice">
                    </div>
                </div>
            </div>
        </div>
        <button class="closeFilters" onclick="showFilters(), setPriceRange();">Show results</button>
    </div>