<?php $__env->startSection('title', 'Contact Us'); ?>
<?php $__env->startSection('body'); ?>
<div class="row d-flex justify-content-center m-5">

  <!-- Contact Form Block -->
  <div class="col-xl-6">
    <h2 class="pb-4">Leave a message</h2>
    <form method="POST" action="<?php echo e(route('contact.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="row g-4">
            <div class="col-12 mb-3">
                <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                <input type="text" class="form-control" name="name" placeholder="John">
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Phone</label>
            <input type="tel" class="form-control" name="phone" placeholder="+1234567890">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Message</label>
            <textarea class="form-control" name="message" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-dark">Send Message</button>
    </form>
  </div>

  <!-- Contact List Block -->
  <div class="col-xl-12 mt-5">
    <h2>Contact List</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Message</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($contact) && is_array($contact) && count($contact) > 0): ?>
                <?php $__currentLoopData = $contact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($contact['name']); ?></td>
                        <td><?php echo e($contact['email']); ?></td>
                        <td><?php echo e($contact['phone']); ?></td>
                        <td><?php echo e($contact['message']); ?></td>
                        <td>
                            <!-- Delete Button -->
                            <form method="POST" action="<?php echo e(route('contact.destroy', $index)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No contact found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("template.main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tugaslaravel_1\resources\views/contact.blade.php ENDPATH**/ ?>