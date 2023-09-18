<div class="overlay  none" id="overlay"></div>
    <div class="filters none" id="filters">
        <div class="top">
        <h1 class="filtersTitle">Filters</h1>
            <div class="filterSection">
                <button class="filterOption" onclick="toggleFilter('solvedState')"> Importance </button>
                <div class=" none" id="solvedState">
                <div class="option">
                        <label for="">Important</label>
                        <input type="radio" name="importance" value="important" id="important">
                    </div>
                    <div class="option">
                        <label for="">Medium</label>
                        <input type="radio" name="importance" value="medium" id="medium">
                    </div>
                </div>
            </div>
        </div>
        <button class="closeFilters" onclick="showFilters(), filterClues();">Show results</button>
    </div>