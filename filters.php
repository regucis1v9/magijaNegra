<div class="overlay  none" id="overlay"></div>
    <div class="filters none" id="filters">
        <div class="top">
        <h1 class="filtersTitle">Filters</h1>
            <div class="filterSection">
                <button class="filterOption" onclick="toggleFilter('solvedState')"> Solved state </button>
                <div class=" none" id="solvedState">
                    <div class="option">
                        <label for="">Solved</label>
                        <input type="radio" name="solvedState" value="yes" id="solved">
                    </div>
                    <div class="option">
                        <label for="">Unsolved</label>
                        <input type="radio" name="solvedState" value="no"  id="unsolved">
                    </div>
                </div>
                <button class="filterOption blackBorderTop" onclick="toggleFilter('difficulty')"> Difficulty </button>
                <div class=" none" id="difficulty">
                    <div class="option">
                        <label for="">Easy</label>
                        <input type="radio" name="difficulty" value="easy" id="easy">
                    </div>
                    <div class="option">
                        <label for="">Hard</label>
                        <input type="radio" name="difficulty" value="hard" id="hard">
                    </div>
                </div>
                <button class="filterOption blackBorderTop" onclick="toggleFilter('date')"> Start date </button> 
                <div class=" none" id="date">
                    <div class="option">
                        <label for="">From</label>
                        <input type="date" id="startDate">
                    </div>
                    <div class="option">
                        <label for="">To</label>
                        <input type="date" id="endDate">
                    </div>
                </div>
            </div>
        </div>
        <button class="closeFilters" onclick="showFilters(), runFilters()">Show results</button>
    </div>