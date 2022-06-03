<template lang="">
    <div class="review-form">
        <form>
            <div class="mb-3 d-flex flex-row align-items-start">
                <img
                    src="http://august.com/frontend/assets/imgs/avatars/avatar_female.png"
                    alt=""
                    width="40"
                    class="rounded-circle"
                />
                <div class="form-floating w-100">
                    <textarea
                        class="form-control form-control-sm w-100"
                        placeholder="Leave a comment here"
                        id="floatingTextarea"
                        style="resize: none; margin-left: 6px"
                    ></textarea>
                    <label for="floatingTextarea">Comment</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </form>
    </div>
</template>
<script>
export default {};
</script>
<style lang=""></style>
