<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Welcome to Skying Club!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/partials/handleLogin.php" method="post">
                <div class="modal-body">
                    <form class="px-4 py-3">
                        <div class="mb-3">
                            <label for="loginUser" class="form-label">User name</label>
                            <input type="text" class="form-control" id="loginUser" name="loginUser"
                                placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <label for="loginPass" class="form-label">Password</label>
                            <input type="password" class="form-control" id="loginPass" name="loginPass"
                                placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="dropdownCheck">
                                <label class="form-check-label" for="dropdownCheck">
                                    Remember me
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#signupModal">New around here? Sign up</a>
                    <a class="dropdown-item" href="#">Forgot password?</a>
            </form>
        </div>
    </div>
</div>
</div>

<?php
    include '_signupModal.php';
?>