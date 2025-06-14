/**
 * Handles all API interactions for the shopping cart.
 */
const cartApi = {
    /**
     * Sends a request to the server to add an item to the cart.
     *
     * @param {string} albumId - The ID of the album to add.
     * @param {number} quantity - The number of albums to add.
     * @returns {Promise<object>} - The JSON response from the server.
     */
    async addToCart(albumId, quantity) {
        // Retrieve the CSRF token from the meta tag in the document's head.
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        try {
            // Send a POST request to the /keranjang endpoint.
            const response = await fetch('/keranjang', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken // Include the CSRF token for security.
                },
                body: JSON.stringify({
                    id_album_222305: albumId,
                    jumlah_222305: quantity
                })
            });

            const result = await response.json();

            if (!response.ok) {
                // If the server returns an error, construct an error message.
                const errorMessage = result.message || 'An unknown error occurred.';
                // Include validation errors if they exist.
                if (result.errors) {
                    const validationErrors = Object.values(result.errors).flat().join('\n');
                    throw new Error(`${errorMessage}\n${validationErrors}`);
                }
                throw new Error(errorMessage);
            }

            // Return the successful response.
            return result;

        } catch (error) {
            console.error('Failed to add item to cart:', error);
            // Re-throw the error to be caught by the calling function.
            throw error;
        }
    }
};

// Export the module to be used in other scripts.
export default cartApi;
