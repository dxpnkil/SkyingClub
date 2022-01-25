<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Register in Skying Club</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/partials/handleSignup.php" method="post">
                <div class="modal-body">
                    <form class="px-4 py-3">
                            <div class="mb-3">
                                <label for="exampleInputPassword1">Full Name</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name">
                            </div>
                            <div class="mb-3">
                                <label for="validationCustomUsername" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="text" class="form-control" id="username" name="username"
                                        aria-describedby="inputGroupPrepend" required>
                                </div>
                            </div>
                        <div class="mb-3">
                            <label for="exampleDropdownFormEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="signupEmail" name="signupEmail"
                                placeholder="email@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="exampleDropdownFormPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="signupPassword" name="signupPassword"
                                placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1">Confirm Password</label>
                            <input type="password" class="form-control" id="signupcPassword" name="signupcPassword"
                                placeholder="Confirm Password">
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Register</button>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Already have an account?</a>
                    </form>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

