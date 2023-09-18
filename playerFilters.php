<div class="overlay  none" id="overlay"></div>
    <div class="filters none" id="filters">
        <div class="top">
        <h1 class="filtersTitle">Filters</h1>
            <div class="filterSection">
                <button class="filterOption" onclick="toggleFilter('solvedState')"> Rank </button>
                <div class=" none" id="solvedState">
                <div class="option">
                        <label for="">Amateur</label>
                        <input type="radio" name="job" value="amateur" id="amateur">
                    </div>
                    <div class="option">
                        <label for="">Noob</label>
                        <input type="radio" name="job" value="noob" id="noob">
                    </div>
                </div>
            </div>
        </div>
        <button class="closeFilters" onclick="showFilters(), filterPlayers();">Show results</button>
    </div>