<main>
    <form method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name">

        <fieldset>
            <legend>Timing</legend>

            <label for="start-time">Start Date</label>
            <input type="datetime-local" name="start-time" id="start-time" required>

            <label for="end-time">End Date</label>
            <input type="datetime-local" name="end-time" id="end-time" required>
        </fieldset>

        <fieldset id="problem-container">
            <legend>Problems</legend>
            <button onclick="addProblem()">Add problem</button>

            <div class="problem">
                <label>Problem ID <input type="text" name="problem-ids[]" required></label>
<!--                <label>Alias <input type="text" name="problem-aliases[]" required></label>-->
            </div>
        </fieldset>

        <button type="submit">Create</button>
    </form>
</main>

<script>
    const problemContainer = document.querySelector("#problem-container");
    function addProblem() {
        problemContainer.innerHTML += `
            <div class="problem">
                <label>Problem ID <input type="text" name="problem-ids[]" required></label>
<!--                <label>Alias <input type="text" name="problem-aliases[]" required></label>-->
            </div>
        `;
    }
</script>
