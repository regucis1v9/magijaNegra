<div class="overlay  none" id="overlay"></div>
    <div class="filters none" id="filters">
        <div class="top">
        <h1 class="filtersTitle">Filters</h1>
            <div class="filterSection">
                <button class="filterOption" onclick="toggleFilter('solvedState')"> Job </button>
                <div class=" none" id="solvedState">
                <div class="option">
                        <label for="">Police Officer</label>
                        <input type="radio" name="job" value="police officer" id="police_officer">
                    </div>
                    <div class="option">
                        <label for="">Detective</label>
                        <input type="radio" name="job" value="detective" id="detective">
                    </div>
                </div>
                <button class="filterOption" onclick="toggleFilter('length')"> Backstory Length </button>
                <div class=" none" id="length">
                    <div class="option">
                        <label for="">Min Length</label>
                        <input type="text" id="minLength" value="0">
                    </div>
                </div>
            </div>
        </div>
        <button class="closeFilters" onclick="showFilters(), filterCharacters();">Show results</button>
    </div>